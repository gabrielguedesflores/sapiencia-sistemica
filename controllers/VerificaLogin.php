<?php
session_start();

if(isset($_POST["email"]) && !empty($_POST["email"]) &&
   isset($_POST["pass"])  &&  !empty($_POST["pass"])){

    include "Database.php";
    $instanciaDb = new Database();

    $email = addslashes($_POST["email"]);
    $pass = addslashes($_POST["pass"]);
    
    $result = $instanciaDb->VerificaLogin($email, $pass);

    $_SESSION["login"] = $result;

    if (empty($_SESSION["login"])){

        $_SESSION['resultLogin'] = "E-mail ou senha incorretos!";
        header("Location: ../views/login/login.php");


    }else{

        header("Location: ../index.php");

    }
}else{
    echo "Não chegou valores do post";
}
