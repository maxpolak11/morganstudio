<?php
	
	$from = $_POST['f_email'];
	$msg = $_POST['f_wiadomosc'];

	require 'assets/php/PHPMailer/PHPMailer.php';
	require 'assets/php/PHPMailer/SMTP.php';
	require 'assets/php/PHPMailer/Exception.php';

	use PHPMailer\PHPMailer\PHPMailer;

	$mail = new PHPMailer();

	$mail->CharSet = 'UTF-8';
	$mail->Encoding = 'base64';

	$mail->isSMTP();
	$mail->Mailer = "smtp";
	$mail->SMTPDebug  = 1;  
	$mail->SMTPAuth   = TRUE;
	$mail->SMTPSecure = "tls";
	$mail->Port       = 587;
	$mail->Host       = "smtp.gmail.com";
	$mail->Username   = "******";
	$mail->Password   = "******";

	$mail->setFrom($from);
	$mail->addReplyTo($from);

	$mail->addAddress('m.bulgajewska@gmail.com', 'Małgorzata Bułgajewska');

	$mail->Subject = 'Morgan Studio - Zapis na wizytę';
	$mail->isHTML(true);

	$mailContent = "
		<h2>Wiadomość od: $from</h2>
		<br><br>
		<p>Treść wiadomości:</p>
		<br>
		$msg
    ";

	$mail->Body = $mailContent;

	$mail->AltBody = "Wiadomość od: $from , $msg";

	// Na razie nic nie wysyłaj //
	echo "success";
	
	// if($mail->send()){
	//     echo 'success';
	// }else{
	//     echo 'Message could not be sent.';
	//     echo 'Mailer Error: ' . $mail->ErrorInfo;
	// }	

?>