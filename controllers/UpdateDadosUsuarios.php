<?php 
session_start();
if(isset($_POST["user_name"]) && !empty($_POST["user_name"]) &&
   isset($_POST["user_lastname"])  &&  !empty($_POST["user_lastname"]) &&
   isset($_POST["user_bday"])  &&  !empty($_POST["user_bday"]) &&
   isset($_POST["user_email"])  &&  !empty($_POST["user_email"]) &&
   isset($_POST["user_pass"])  &&  !empty($_POST["user_pass"]) &&
   isset($_POST["user_state"])  &&  !empty($_POST["user_state"])){

    include "Database.php";
    $instanciaDb = new Database();

    $user_name = addslashes($_POST["user_name"]);
    $user_lastname = addslashes($_POST["user_lastname"]);
    $user_bday = addslashes($_POST["user_bday"]);
    $user_email = addslashes($_POST["user_email"]);
    $user_pass = addslashes($_POST["user_pass"]);
    $user_state = addslashes($_POST["user_state"]);
    
    $instanciaDb->UpdateDadosUsuario($user_name, $user_lastname, $user_bday, $user_email, $user_pass, $user_state);
    $_SESSION["login"] = $instanciaDb->VerificaLogin($user_email, $user_pass);

    header("Location: ../index.php");
}