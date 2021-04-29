<?php 

session_start();
include "Database.php";
include "SendEmail.php";
$instanciaDb = new Database();
$instanciaSe = new SendEmail();

if(isset($_POST["schedule_id"]) && !empty($_POST["schedule_id"]) ){

    $schedule_id = $_POST['schedule_id'];

    $UpdateAprovaStatus = $instanciaDb->UpdateReprovaStatus($schedule_id);
    $getAgendaEspecifica = $instanciaDb->MostraAgendaEspecifica($schedule_id);

    $messageBody = utf8_decode("Olá, ".$getAgendaEspecifica->user_name."!<BR><BR>

                    Infelizmente não vamos conseguir lhe atender nesta data e horário.<br><br> 

                    Podemos remarcar? Se sim, favor respoder este e-mail com uma nova data ou fazer um novo agendamento pelo site.
                    
                    Dados da Consulta Reprovada: <BR><BR>
                    Data: ".$getAgendaEspecifica->schedule_date."<BR>
                    Horário: ".$getAgendaEspecifica->available_time_desc."<BR>
                    Nome: ".$getAgendaEspecifica->user_name."<BR>
                    Consulta: ".$getAgendaEspecifica->schedule_type_desc."
                    <BR><BR>
                    
                    
                    Atenciosamente, <br>
                    Equipe Sapiência Sistêmica");

    $subject = utf8_decode("Atualização de Consulta");
    $getName = $getAgendaEspecifica->user_name;
    $getEmail = $getAgendaEspecifica->user_email;

    $instanciaSe->enviaEmail($getName, $getEmail, $messageBody, $subject);

    //echo $getAgendaEspecifica->schedule_date;
    header("Location: ../dashboard/dashboard.php");
    
   };

