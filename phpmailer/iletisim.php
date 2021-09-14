
<?php

	require_once("class.phpmailer.php");

	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->Host = "mail.alanadiniz.com veya IP";
	$mail->SMTPAuth = true;
	$mail->Username = "ornek@alanadiniz.com";
	$mail->Password = "*********";
	$mail->From = "ornek@alanadiniz.com";
	$mail->Fromname = $_POST['isim'];
	$mail->AddAddress("ornek@alanadiniz.com","Mail gönderimi");
	$mail->AddReplyTo('replyto@email.com', 'Reply to name');
	$mail->Subject = $_POST['konu'] . $_POST['eposta'];
	$mail->Body = $_POST['mesaj'];
#$mail->ErrorInfo
	if(!$mail->Send())
	{

	}

	 else {

	}

?>

