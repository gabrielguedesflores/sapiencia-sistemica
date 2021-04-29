<?php
session_start();

if(isset($_POST["user_name"])  &&  !empty($_POST["user_name"]) &&
   isset($_POST["user_lastname"]) && !empty($_POST["user_lastname"]) &&
   isset($_POST["user_bday"])  &&  !empty($_POST["user_bday"]) &&
   isset($_POST["user_email"])  &&  !empty($_POST["user_email"]) &&
   isset($_POST["user_pass"])  &&  !empty($_POST["user_pass"])){

    include "Database.php";
    $instanciaDb = new Database();

    $user_name = addslashes($_POST["user_name"]);
    $user_lastname = addslashes($_POST["user_lastname"]);
    $user_bday = addslashes($_POST["user_bday"]);
    $user_state = addslashes($_POST["user_state"]);
    $user_email = addslashes($_POST["user_email"]);
    $user_pass = addslashes($_POST["user_pass"]);
    
    $cadastra = $instanciaDb->CadastraUsuario($user_name, $user_lastname, $user_bday, $user_email, $user_pass, $user_state);

    $result = $instanciaDb->VerificaLogin($email, $pass);
    $_SESSION["login"] = $result;

    //var_dump($result);
    

    header("Location: ../index.php");

}else{
    echo "Não deu certo";
}
