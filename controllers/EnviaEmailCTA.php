<?php
session_start();

if(isset($_POST["name"])  && !empty($_POST["name"]) && 
   isset($_POST["email"]) && !empty($_POST["email"]) &&
   isset($_POST["message"]) && !empty($_POST["message"])){

    include __DIR__."/SendEmail.php";
    $instanciaSE = new SendEmail();

    $name = utf8_decode($_POST["name"]);
    $email = utf8_decode($_POST["email"]);
    $message = utf8_decode($_POST["message"]);
    $messageBody = utf8_decode("<BR>Estou passando para lhe dizer que rebecemos sua mensagem, obrigado pela interação. Logo entramos em contato! <BR><BR>
                    Sua mensagem: <BR><BR>".$message."<BR><BR><BR>
                    Atenciosamente, <br>
                    Equipe Sapiência Sistêmica");

    $subject = utf8_decode("Nova mensagem recebida!");
    $subject1 = utf8_decode("Olá, $name!");

    $messageBody1 = "Você tem uma nova mensagem site Sapiência Sistêmica. <BR><BR>
                    Nome: ".$name."<BR>
                    E-mail: ".$email."<BR>
                    Mensagem: ".$message."<BR><BR><BR>
                    Atenciosamente, <br>
                    Equipe Sapiência Sistêmica";

    $instanciaSE->enviaEmail($name, $email, $messageBody, $subject1); //envia e-mail para o cliente
    $instanciaSE->enviaEmail($name, "contato@sapienciasistemicahomolog.kinghost.net", $messageBody1, $subject); //envia e-mail para o adm

    header("Location: ../index.php");
}
