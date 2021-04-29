<?php

if(isset($_POST["schedule_date"]) && !empty($_POST["schedule_date"])){

    session_start();
    $schedule_date = $_POST["schedule_date"];

    $_SESSION["schedule_date"] = $schedule_date;

    //echo $schedule_date;
    header("Location: ../views/agenda/agendamento.php");

}
