<?php

//namespace DAO;

class Database 
{
    public $db; //alterei para public - Gabriel Guedes Flores
    public $order = []; //alterei para public - Gabriel Guedes Flores

    /**
     * Representa a instancia a classe,
     * logo nas classes filhas esse atributo
     * deve ser sobrescrito de maneira que
     * mantenha em memória a instância correta
     *
     * @var Class
     * @access protected
     */
    protected static  $oInstance;

    public function __construct ($dbname = 'sapienciasistemicahomolog', $host = 'pgsql.sapienciasistemicahomolog.kinghost.net', $port = '5432', $user = 'sapienciasistemicahomolog', $pass = '') 
    {
        $dsn = "pgsql:dbname={$dbname};host={$host};port={$port}";
        
        $this->db = new \PDO($dsn, $user, $pass);
    }

    /**
     * Retorna a instancia do repositório
     *
     * @return static
     */

    public static function getInstance()
    {
        if (empty(static::$oInstance)) {
            static::$oInstance = new static;
        }

        return static::$oInstance;
    }

    public function filtrarPorId($id, $fields = null)
    {
        $fields = $this->prepareFields($fields);

        $dbst = $this->db->prepare(" SELECT $fields FROM ". static::TABLE ." WHERE id = :id ");
        $dbst->bindValue(':id', $id, \PDO::PARAM_STR);

        return $this->execute($dbst);
    }

    public function filtrarPorDescricao($descricao, $fields = null)
    {
        $fields = $this->prepareFields($fields);
        
        $dbst = $this->db->prepare(" SELECT $fields FROM ". static::TABLE ." WHERE descricao ILIKE :descricao ");
        $dbst->bindValue(':descricao', $descricao, \PDO::PARAM_STR);

        return $this->execute($dbst);
    }

    protected function filtrar ($where, $whereValues, $fields = null)
    {
        $fields = $this->prepareFields($fields);

        $order = null;
        if(!empty($this->order)) {

            $ords = [];
            foreach($this->order as $ord => $dir) {

                $ords[] = "{$ord} {$dir}";
            }

            $order = ' ORDER BY ' . implode(',', $ords);
        }

        $dbst   = $this->db->prepare(" SELECT {$fields} FROM ". static::TABLE ." WHERE {$where} {$order} ");

        if(is_array($whereValues) && !empty($whereValues)) {

            foreach ($whereValues as $param => $value) {

                if(strpos($value, ',') === false) {
                    $typeParam = is_int($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR;
                    $dbst->bindValue(':'. $param, $value, $typeParam);
                } 
            }
        }

        return $this->execute($dbst);
    }

    public function getAll($limit = null)
    {
        if(!empty($limit)) {
            $limit = ' LIMIT ' . (int)$limit;
        }
        
        $order = null;
        if(!empty($this->order)) {

            $ords = [];
            foreach($this->order as $ord => $dir) {

                $ords[] = "{$ord} {$dir}";
            }

            $order = ' ORDER BY ' . implode(',', $ords);
        }

        $fields = $this->prepareFields();

        return $this->execute($this->db->prepare(" SELECT $fields FROM " . static::TABLE ." {$order} {$limit} "));
    }

    public function order($column, $direction = 'ASC')
    {
        if(!empty($column) && !empty($direction)) {
            $this->order[$column] = $direction;
        }

        return $this;
    }

    public function execute($dbst)
    {
        $results = $dbst->execute();

        if($results === false) {
            throw new \Exception("Não foi possível executar a consulta\n". implode("\n", $dbst->errorInfo()));
        }

        if($dbst->rowCount() == 0) {
            return null;
        }

        if($dbst->rowCount() == 1) {
            return $dbst->fetchObject();
        }

        $res = [];
        while ($row = $dbst->fetch(\PDO::FETCH_ASSOC, \PDO::FETCH_ORI_NEXT)) {
            $res[] = (object)$row;
        } 

        return $res;
    }

    protected function prepareFields($fields = null)
    {
        if(empty($fields)) {
            $fields = '*';
        } else {

            if(is_array($fields)) {
                $fields = implode(', ', $fields);
            }
        }

        return $fields;
    }

    //VERIFICA O LOGIN PARA DEIXAR O USUÁRIO LOGAR
    public function VerificaLogin($email, $pass) 
    {
             $dbst = $this->db->prepare("SELECT * FROM users WHERE user_email = '".$email."' AND user_pass = md5('".$pass."')");
             return $this->execute($dbst);
             
             //header("Location: index.php");      
            
    }   

    //CADASTRA O USUÁRIO NO BANCO
    public function CadastraUsuario($user_name, $user_lastname, $user_bday, $user_email, $user_pass, $user_state) 
    {
             $dbst = $this->db->prepare("INSERT INTO users (user_name, user_lastname, user_bday, user_email, user_pass, user_state)
             VALUES ('".$user_name."', '".$user_lastname."', '".$user_bday."', '".$user_email."',  MD5('".$user_pass."'), '".$user_state."')");
             return $this->execute($dbst);
             
             //header("Location: index.php");      
            
    }
    
    //MOSTRA AGENDA COMPLETA
    public function MostraAgenda() 
    {
             $dbst = $this->db->prepare("SELECT schedules.schedule_id, 
             available_times.available_time_desc, 
             to_char(schedules.schedule_date, 'DD/MM/YYYY') schedule_date,
             users.user_name,
             users.user_lastname, 
             schedule_type.schedule_type_desc, 
             schedule_type.schedule_type_value,
             schedules_status.schedule_status_desc
             
             FROM schedules, available_times, users, schedule_type, schedules_status
             
             WHERE schedules.schedule_user_id = users.user_id
             AND schedules.schedule_available_times_id = available_times.available_time_id
             AND schedules.schedule_type_id = schedule_type.schedule_type_id
             AND schedules.schedule_status_id = schedules_status.schedule_status_id
             ORDER BY schedules.schedule_date, available_times.available_time_desc");

             return $this->execute($dbst);
             
             //header("Location: index.php");      
            
    } 

    //MOSTRA AGENDA COMPLETA - APROVADAS
    public function MostraAgendaAprovada() 
    {
             $dbst = $this->db->prepare("SELECT schedules.schedule_id, 
             available_times.available_time_desc, 
             to_char(schedules.schedule_date, 'DD/MM/YYYY') schedule_date,
             users.user_name,
             users.user_lastname, 
             schedule_type.schedule_type_desc, 
             schedule_type.schedule_type_value,
             schedules_status.schedule_status_desc
             
             FROM schedules, available_times, users, schedule_type, schedules_status
             
             WHERE schedules.schedule_user_id = users.user_id
             AND schedules.schedule_available_times_id = available_times.available_time_id
             AND schedules.schedule_type_id = schedule_type.schedule_type_id
             AND schedules.schedule_status_id = schedules_status.schedule_status_id
             AND schedules_status.schedule_status_id = 2
             ORDER BY schedules.schedule_date, available_times.available_time_desc");

             return $this->execute($dbst);
             
             //header("Location: index.php");      
            
    } 

    //MOSTRA AGENDA COMPLETA - PENDENTE DE APROVAÇÃO
    public function MostraAgendaPendente() 
    {
             $dbst = $this->db->prepare("SELECT schedules.schedule_id, 
             available_times.available_time_desc, 
             to_char(schedules.schedule_date, 'DD/MM/YYYY') schedule_date,
             users.user_name,
             users.user_lastname, 
             schedule_type.schedule_type_desc, 
             schedule_type.schedule_type_value,
             schedules_status.schedule_status_desc
             
             FROM schedules, available_times, users, schedule_type, schedules_status
             
             WHERE schedules.schedule_user_id = users.user_id
             AND schedules.schedule_available_times_id = available_times.available_time_id
             AND schedules.schedule_type_id = schedule_type.schedule_type_id
             AND schedules.schedule_status_id = schedules_status.schedule_status_id
             AND schedules_status.schedule_status_id = 1
             ORDER BY schedules.schedule_date, available_times.available_time_desc");

             return $this->execute($dbst);
             
             //header("Location: index.php");      
            
    } 

    //MOSTRA AGENDA COMPLETA - REPROVADA
    public function MostraAgendaReprovada() 
    {
             $dbst = $this->db->prepare("SELECT schedules.schedule_id, 
             available_times.available_time_desc, 
             to_char(schedules.schedule_date, 'DD/MM/YYYY') schedule_date,
             users.user_name,
             users.user_lastname, 
             schedule_type.schedule_type_desc, 
             schedule_type.schedule_type_value,
             schedules_status.schedule_status_desc
             
             FROM schedules, available_times, users, schedule_type, schedules_status
             
             WHERE schedules.schedule_user_id = users.user_id
             AND schedules.schedule_available_times_id = available_times.available_time_id
             AND schedules.schedule_type_id = schedule_type.schedule_type_id
             AND schedules.schedule_status_id = schedules_status.schedule_status_id
             AND schedules_status.schedule_status_id = 3
             ORDER BY schedules.schedule_date, available_times.available_time_desc");

             return $this->execute($dbst);
             
             //header("Location: index.php");      
            
    } 

    //MOSTRA UM AGENDAMENTO ESPECIFICO USANDO O ID COMO PARAMETRO
    public function MostraAgendaEspecifica($schedule_id) 
    {
             $dbst = $this->db->prepare("SELECT schedules.schedule_id, 
             available_times.available_time_desc, 
             to_char(schedules.schedule_date, 'DD/MM/YYYY') schedule_date
             users.user_name,
             users.user_lastname, 
             users.user_email, 
             schedule_type.schedule_type_desc, 
             schedule_type.schedule_type_value,
             schedules_status.schedule_status_desc
             
             FROM schedules, available_times, users, schedule_type, schedules_status
             
             WHERE schedules.schedule_id = '$schedule_id'
             AND schedules.schedule_user_id = users.user_id
             AND schedules.schedule_available_times_id = available_times.available_time_id
             AND schedules.schedule_type_id = schedule_type.schedule_type_id
             AND schedules.schedule_status_id = schedules_status.schedule_status_id
             ORDER BY schedules.schedule_date, available_times.available_time_desc");

             return $this->execute($dbst);
             
             //header("Location: index.php");      
            
    } 

    public function MostraScheduleType() 
    {
             $dbst = $this->db->prepare("SELECT * FROM schedule_type");

             return $this->execute($dbst);
             
             //header("Location: index.php");      
            
    } 

    public function MostraAvailableTimes() 
    {
             $dbst = $this->db->prepare("SELECT * FROM available_times");

             return $this->execute($dbst);
             
             //header("Location: index.php");      
            
    } 

    //MOSTRA OS NOMES DE USUÁRIOS  
    public function MostraUsersNames() 
    {
             $dbst = $this->db->prepare("SELECT * FROM available_times");

             return $this->execute($dbst);
             
             //header("Location: index.php");      
            
    } 

    //AGENDA A CONSULTA 
    public function CadastraAgenda($schedule_date, $available_time, $schedule_type, $user_id, $schedule_status_id) 
    {
            $schedule_status_id = 1;
            $dbst = $this->db->prepare("INSERT INTO schedules (schedule_available_times_id, schedule_status_id, schedule_user_id, schedule_type_id, schedule_date)
             VALUES (".$available_time.", ".$schedule_status_id.", ".$user_id.", ".$schedule_type.", '".$schedule_date."')");

            return $this->execute($dbst);
                 
            
    } 

    #APROVA CONSULTA NO DASHBOARD
    public function UpdateAprovaStatus($schedule_id) 
    {
            $dbst = $this->db->prepare("UPDATE schedules SET schedule_status_id = 2 WHERE schedule_id = $schedule_id;");
            return $this->execute($dbst);
    } 

    //REPROVA A CONSULTA NO DASHBOARD
    public function UpdateReprovaStatus($schedule_id) 
    {
            $dbst = $this->db->prepare("UPDATE schedules SET schedule_status_id = 3 WHERE schedule_id = $schedule_id;");
            return $this->execute($dbst);                             
    }

    public function MostraClientes() 
    {
             $dbst = $this->db->prepare("SELECT user_name, 
             user_lastname, 
             to_char(user_bday, 'DD/MM/YYYY') user_bday,
             user_email,
             user_state
             
             FROM users
             
             ORDER BY user_id");

             return $this->execute($dbst);
             
             //header("Location: index.php");      
            
    } 

    ## CLASSES QUE MOSTRAM AS DÚVIDAS FREQUENTES ------------------------------------------------------------------------------

    public function MostraQuestions() 
    {
            $dbst = $this->db->prepare("SELECT * FROM questions;");
            return $this->execute($dbst);
    }
    
    public function MostraQuestionEspecifica($question_id) 
    {
            $dbst = $this->db->prepare("SELECT * FROM questions WHERE question_id = $question_id;");
            return $this->execute($dbst);
    }

    public function MostraQuestionCategory($questions_category_id) 
    {
            $dbst = $this->db->prepare("SELECT * FROM questions WHERE questions_category_id = $questions_category_id;");
            return $this->execute($dbst);
    }

    ## CLASSES QUE MOSTRAM OS POSTS DO BLOG --------------------------------------------------

    public function MostraBlog() 
    {
            $dbst = $this->db->prepare("SELECT * FROM blog;");
            return $this->execute($dbst);
    }
    
    public function MostraBlogEspecifica($blog_id) 
    {
            $dbst = $this->db->prepare("SELECT * FROM blog WHERE blog_id = $blog_id;");
            return $this->execute($dbst);
    }

    public function MostraBlogCategory($blog_category_id) 
    {
            $dbst = $this->db->prepare("SELECT * FROM blog WHERE blog_category_id = $blog_category_id;");
            return $this->execute($dbst);
    }

    ## FAZ UPDATE NA SENHA  -------------------------------------------------- --------------------------------------------------
    public function UpdateSenha($user_email, $user_pass) 
    {
            $dbst = $this->db->prepare("UPDATE users SET user_pass = md5('$user_pass') WHERE user_email = '$user_email';");
            return $this->execute($dbst);
    }

    ## FAZ UPDATE NOS DADOS DO USUÁRIO  -------------------------------------------------- 
    public function UpdateDadosUsuario($user_name, $user_lastname, $user_bday, $user_email, $user_pass, $user_state) 
    {
            $dbst = $this->db->prepare("UPDATE users 
                                        SET user_name = '$user_name'
                                        ,user_lastname = '$user_lastname'
                                        ,user_bday = '$user_bday'
                                        ,user_email = '$user_email'
                                        ,user_pass = md5('$user_pass')
                                        ,user_state = '$user_state'
                                        WHERE user_email = '$user_email';");
            return $this->execute($dbst);
    }

     ## FAZ UPDATE NOS DADOS DO USUÁRIO  -----------------------------------------
     public function MostraHorariosLivres($schedule_date) 
     {
             $dbst = $this->db->prepare("SELECT return_date('$schedule_date') || ' ' || available_times.available_time_desc AS a
             , available_times.available_time_id
             , available_times.available_time_desc
             FROM available_times
             WHERE return_date('$schedule_date') || ' ' || available_times.available_time_desc 
                NOT IN (SELECT a FROM available_times, return_date_schedule('$schedule_date', available_time_id));");

             return $this->execute($dbst);
     }

     ## CRIA UMA DÚVIDA   -----------------------------------------
     public function CriaDuvidas($question_name, $question_desc, $questions_category_id)
     {
             $dbst = $this->db->prepare("INSERT INTO questions (question_name, question_desc, questions_category_id)
             values ('$question_name', '$question_desc', $questions_category_id);");

             return $this->execute($dbst);
     }

     ## CRIA POST   -----------------------------------------
     public function CriaPost($blog_name, $blog_desc, $blog_category_id)
     {
             $dbst = $this->db->prepare("INSERT INTO blog (blog_name, blog_desc, blog_category_id)
             values ('$blog_name', '$blog_desc', $blog_category_id);");

             return $this->execute($dbst);
     }

     ## FUNCTIONS CARTEIRA 
     ## VALOR HOJE   -----------------------------------------
     public function ValorHoje()
     {
             $dbst = $this->db->prepare("SELECT sum(schedule_type.schedule_type_value) 
             from schedules
                 RIGHT JOIN schedule_type ON schedules.schedule_type_id = schedule_type.schedule_type_id
             WHERE schedule_status_id = 2 
             AND schedules.schedule_date = current_date");

             return $this->execute($dbst);
     }

     ## VALOR MÊS   -----------------------------------------
     public function ValorMes()
     {
             $dbst = $this->db->prepare("SELECT sum(schedule_type.schedule_type_value) 
             FROM schedules
                 RIGHT JOIN schedule_type ON schedules.schedule_type_id = schedule_type.schedule_type_id
             
             WHERE schedule_status_id = 2 
             AND schedules.schedule_date >= date_trunc('month', CURRENT_DATE)
             AND schedules.schedule_date <= date_trunc('month', CURRENT_DATE) + interval '1 month - 1 day'");

             return $this->execute($dbst);
     }

     ## VALOR TOTAL   -----------------------------------------
     public function ValorTotal()
     {
             $dbst = $this->db->prepare("SELECT sum(schedule_type.schedule_type_value) 
             FROM schedules
                 RIGHT JOIN schedule_type ON schedules.schedule_type_id = schedule_type.schedule_type_id
             
             WHERE schedule_status_id = 2");

             return $this->execute($dbst);
     }

     ## TABELA DE SCHEDULES E VALORES   -----------------------------------------
     public function TabelaValores()
     {
             $dbst = $this->db->prepare("SELECT  
             to_char(schedules.schedule_date, 'DD/MM/YYYY') schedule_date,
             available_times.available_time_desc, 
             users.user_name || ' ' || users.user_lastname user_name, 
             schedule_type.schedule_type_desc, 
             schedule_type.schedule_type_value
                          
             FROM schedules, available_times, users, schedule_type, schedules_status
                          
             WHERE schedules.schedule_user_id = users.user_id
             AND schedules.schedule_available_times_id = available_times.available_time_id
             AND schedules.schedule_type_id = schedule_type.schedule_type_id
             AND schedules.schedule_status_id = schedules_status.schedule_status_id
             AND schedules_status.schedule_status_id = 2
             ORDER BY schedules.schedule_date, available_times.available_time_desc");

             return $this->execute($dbst);
     }
     

    public function __destruct () 
    {
    }
}
/*
$teste = new Database();
$resultado = $teste->VerificaLogin('gabrielguedesflores@gmail.com', '123');
var_dump ($resultado);
echo "<br>".$resultado->user_email;
*/
/*
$teste = new Database();
$resultado = $teste->CadastraUsuario('Marina', 'Lima Rodrigues', '2000-11-18', 'marinalima@hotmail.com', '123');
var_dump ($resultado);
echo "<br>".$resultado->user_email;
*/
/*
$teste = new Database();
$resultado = $teste->ValorTotal();
echo "<pre>";
var_dump ($resultado);
echo "</pre>";
echo "<br>".$resultado->sum ;
*/ 
