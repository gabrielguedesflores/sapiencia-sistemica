<?php
session_start();
echo $_SESSION["schedule_date"];

if(isset($_SESSION["schedule_date"])  && !empty($_SESSION["schedule_date"]) && 
   isset($_POST["available_time"]) && !empty($_POST["available_time"]) &&
   isset($_POST["user_id"]) && !empty($_POST["user_id"]) &&
   isset($_POST["schedule_type"]) && !empty($_POST["schedule_type"])){

    include __DIR__."/Database.php";
    include __DIR__."/SendEmail.php";

    $instanciaDb = new Database();
    $instanciaSE = new SendEmail();

    $getNames = $_SESSION["login"];
    $getName = $getNames->user_name;
    $getLastName = $getNames->user_lastname;

    $schedule_date = $_SESSION["schedule_date"];//("d/m/Y");
    $available_time = $_POST["available_time"];
    $schedule_type = $_POST["schedule_type"];
    $user_id = $_POST["user_id"];
    $schedule_status_id = 1;

    if ($schedule_type == 1) {
            $schedule_type_desc = "Constelação Familiar";
    }elseif($schedule_type == 2){
            $schedule_type_desc = "Coaching Sistêmico";
    }

    switch ($available_time) {
        case $available_time == 1: $available_time_desc = "08:30"; break;
        case $available_time == 2: $available_time_desc = "10:00"; break;
        case $available_time == 3: $available_time_desc = "13:00"; break;
        case $available_time == 4: $available_time_desc = "14:30"; break;
        case $available_time == 5: $available_time_desc = "16:00"; break;
        case $available_time == 6: $available_time_desc = "17:30"; break;
        default:
            $available_time_desc = "null";
            break;
    }

    ## ENVIA E-MAIL ADM AO CADASTRAR UMA CONSULTA
    
    $instanciaDb->CadastraAgenda($schedule_date, $available_time, $schedule_type, $user_id, $schedule_status_id);

    $messageBody = utf8_decode("Olá, <BR><BR>

                    Temos um novo agendamento pelo site! Segue os dados: <BR><BR>
                    Data: ".$schedule_date."<BR>
                    Horário: ".$available_time_desc."<BR>
                    Nome: ".$getName."<BR>
                    Consulta: ".$schedule_type_desc."<BR><BR>
                    Acesse seu dashboard para aprovar ou não: http://sapienciasistemicahomolog.kinghost.net/dashboard/dashboard.php

                    <BR><BR>
                    
                    Atenciosamente, <br>
                    Equipe Sapiência Sistêmica");

    $subject = utf8_decode("Nova consulta marcada");

    $instanciaSE->enviaEmail($getName, "contato@sapienciasistemicahomolog.kinghost.net", $messageBody, $subject);

    $_SESSION["cadastro"] = "Horário marcado com sucesso! :)";

    //header("Location: ../index.php?pagina=home");



    ## ENVIA E-MAIL CLIENTE

    $messageBody = utf8_decode("Recebemos sua solicitação de consulta! Vamos marcar na nossa agenda e em seguida enviamos a confirmação.<br><br> 
                    
                    Segue os dados: <BR><BR>
                    Data: ".$schedule_date."<BR>
                    Horário: ".$available_time_desc."<BR>
                    Nome: ".$getName."<BR>
                    Consulta: ".$schedule_type_desc."
                    <BR><BR>
                    
                    Atenciosamente, <br>
                    Equipe Sapiência Sistêmica");

    $subject = utf8_decode("Olá, $getName");

    $instanciaSE->enviaEmail($getName, $getNames->user_email, $messageBody, $subject);

    header ("Location: ../index.php");

}else{
    echo "Não deu certo";
}
