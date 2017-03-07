<html>
<head>
<title>ThaiCreate.Com Tutorial</title>
</head>
<body>
<?php
	// require_once('Mailer/class.phpmailer.php');
  require_once('Mailer/PHPMailerAutoload.php');
  require ("config/configuration.php");

	$mail = new PHPMailer();
	$mail->IsHTML(true);
	$mail->IsSMTP();

  //$mail->SMTPDebug  = 2;
	$mail->SMTPAuth = MAIL_SMTPAuth;//true; // enable SMTP authentication
	$mail->SMTPSecure = MAIL_SMTPSecure;//"ssl"; // sets the prefix to the servier

	$mail->Host = MAIL_HOST;//"smtp.gmail.com"; // sets GMAIL as the SMTP server
	$mail->Port = MAIL_PORT;//465; // set the SMTP port for the GMAIL server
	$mail->Username = MAIL_USERMAIL;//"tantawantmp@gmail.com"; // GMAIL username
	$mail->Password = MAIL_PWDMAIL;//"tantawan"; // GMAIL password
	$mail->From = "lljobzll@gmail.com"; // "name@yourdomain.com";
	//$mail->AddReplyTo = "support@thaicreate.com"; // Reply
	$mail->FromName = "Test Job";  // set from Name
	$mail->Subject = "Test sending mail.";
	$mail->Body = "Test send Email";

	$mail->AddAddress("admin@tantawancorp.co.th", "Hi"); // to Address

	// $mail->AddAttachment("thaicreate/myfile.zip");
	// $mail->AddAttachment("thaicreate/myfile2.zip");

	//$mail->AddCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC
	//$mail->AddBCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC

	$mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low
  //echo 'line 32';
	$mail->Send();
  // if(!$mail->Send()){
  //  echo "Message could not be sent. <p>";
  //  echo "Mailer Error: " . $mail->ErrorInfo;
  //  exit;
  //  }
?>
</body>
</html>
