<?php 

require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SendEmail{
	
	public function enviaEmail($name, $email, $message, $subjectModelo){
		
		try {

			$mail = new PHPMailer(true);
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;
			$mail->isSMTP();
			$mail->Host = 'smtp.kinghost.net';
			$mail->SMTPAuth = true;
			$mail->Username = 'contato@sapienciasistemicahomolog.kinghost.net';
			$mail->Password = ''; //senha do e-mail
			$mail->Port = 587;
			
			// Define o remetente
			$mail->setFrom('contato@sapienciasistemicahomolog.kinghost.net');

			 // Define o destinatário
            $mail->addAddress($email);
		
			$mail->isHTML(true);
			$mail->Subject = $subjectModelo;
			$mail->Body = $message;			
            $mail->AltBody = 'Mensagem enviado com sucesso!';
		
			if($mail->send()){
                return true;
			}else{
				echo 'Erro ao enviar e-mail';
			}
		
		} catch (Exception $e){
			echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
		}
	}

}

header("Location: ".$_SERVER['HTTP_REFERER']."");

/*
try {

	$mail->SMTPDebug = SMTP::DEBUG_SERVER;
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'gabriielfloores97@gmail.com';
	$mail->Password = 'Bi554655';
	$mail->Port = 587;

	$mail->setFrom('gabriielfloores97@gmail.com');
	$mail->addAddress('gabriielfloores97@gmail.com');

	$mail->isHTML(true);
	$mail->Subject = 'Auto-vendas - Retorno do Contato';
	$mail->Body = 'Chegou pae';
	$mail->AltBody = 'Chegou pae';

	if($mail->send()){
		echo 'E-mail enviado com sucesso';
	}else{
		echo 'Erro ao enviar e-mail';
	}


} catch (Exception $e){
	echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}


$teste = new SendEmail();
$teste->enviaEmail('Gabriel', '9999999', '$date_bd', '$email', 'mensagem');
*/
