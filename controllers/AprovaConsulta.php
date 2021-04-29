<?php 

session_start();
include "Database.php";
include "SendEmail.php";
$instanciaDb = new Database();
$instanciaSendEmail = new SendEmail();
 

if(isset($_POST["schedule_id"]) && !empty($_POST["schedule_id"]) ){

    $schedule_id = $_POST['schedule_id'];

    $UpdateAprovaStatus = $instanciaDb->UpdateAprovaStatus($schedule_id);
    
    $instanciaAgenda = $instanciaDb->MostraAgendaEspecifica($schedule_id);

    ## ENVIA E-MAIL PARA CLIENTE CONFIRMANDO A CONSULTA - ADICIONAR A CHAVE DO PIX 
    $pix = "035.809.440-29";
    $messageBody = utf8_decode("Olá, $instanciaAgenda->user_name!<BR><BR>

                    Consulta confirmada! Segue os dados: <BR><BR>
                    Data: ".$instanciaAgenda->schedule_date."<BR>
                    Horário: ".$instanciaAgenda->available_time_desc."<BR>
                    Nome: ".$instanciaAgenda->user_name."<BR>
                    Consulta: ".$instanciaAgenda->schedule_type_desc."<BR>
                    Valor da Consulta: R$".$instanciaAgenda->schedule_type_value."<BR><BR>

                    O pagamento é feito via PIX, a nossa chave é: <BR><BR>
                    
                    $pix
                    
                    <BR><BR>
                    
                    Aguardaremos a confirmação do pagamento. Você reberá um e-mail.<br><Br>
                    
                    Atenciosamente, <br>
                    Equipe Sapiência Sistêmica");

    $subject = utf8_decode("Atualização de Consulta");

    $instanciaSendEmail->enviaEmail($instanciaAgenda->user_name, $instanciaAgenda->user_email, $messageBody, $subject);

    //header("Location: dashboard.php");
    
    
   };

