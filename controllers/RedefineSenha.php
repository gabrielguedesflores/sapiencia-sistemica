<?php 

if(isset($_POST["user_email"]) && !empty($_POST["user_email"]) && 
   isset($_POST["user_name"]) && !empty($_POST["user_name"])){
    
    include "Database.php";
    include "SendEmail.php";
    $instanciaDb = new Database();
    $instanciaSe = new SendEmail(); 

    $user_email = addslashes($_POST["user_email"]);
    $user_name = addslashes($_POST["user_name"]);
    
    $messageBody = utf8_decode("Olá, $user_name!<BR><BR>

                    Para redefinir sua senha clique o link abaixo: <br><br>

                    http://sapienciasistemicahomolog.kinghost.net/views/login/insere_nova_senha.php
                    <BR><BR>
                    
                    Atenciosamente, <BR><BR>
                    Sapiência Sisêmica");

    $subject = utf8_decode("Redefinir de Senha");
    $_SESSION['resultRedefineSenha'] = "Clique no link que você recebeu no e-mail!";
    $instanciaSe->enviaEmail($user_name, $user_email, $messageBody, $subject);
    header("Location: ../views/login/login.php");


}else{
    echo "Não chegou valores do post";
}