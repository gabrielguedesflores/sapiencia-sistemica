<?php
session_start();
if(isset($_POST["user_email"]) && !empty($_POST["user_email"]) && 
   isset($_POST["new_pass"]) && !empty($_POST["new_pass"]) &&
   isset($_POST["new_pass_again"]) && !empty($_POST["new_pass_again"]) &&
   $_POST["new_pass"] == $_POST["new_pass_again"]){

    include "Database.php";
    $instanciaDb = new Database();

    $user_email = addslashes($_POST["user_email"]);
    $new_pass = addslashes($_POST["new_pass"]);
    $new_pass_again = addslashes($_POST["new_pass_again"]);

    if($new_pass == $new_pass_again){

        $instanciaDb->UpdateSenha($user_email, $new_pass);
        $_SESSION["update_senha_success"] = "Senha alterada com sucesso!";
        echo "Senha alterada com sucesso!";
        header ("Location: ../index.php");

    }else{

        $_SESSION["update_senha_fail"] = "As senhas não coincidem";
        echo "As senhas não coincidem";
        header ("Location: ?pagina=home");

    }

    
   }else{
       echo "Você não preencheu todos os campos e/ou as senhas não conferem.";
       $_SESSION["UpdateSenha"] = "Você não preencheu todos os campos e/ou as senhas não conferem.";
       header ("Location: ../views/login/insere_nova_senha.php");
   }

