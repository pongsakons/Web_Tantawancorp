<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
</head>
<body>  
	
<?php 
	// require_once('Mailer/class.phpmailer.php');

  require_once('Mailer/PHPMailerAutoload.php'); 
  require ("config/configuration.php");
header('Content-Type: text/html; charset=utf-8');

	if($_POST['mailtype'] == "contact"){
		$sumName = $_POST['firstname']." ".$_POST['lastname']." ".$_POST['phonenumber'];
		$From = $_POST['emailaddress'];
		$FromName = '=?utf-8?B?'.base64_encode($sumName).'?=';
		$Subject = '=?utf-8?B?'.base64_encode($_POST['subject']).'?=';
		$Body = $_POST['message'];
		$ToMail = $_POST['toMail'];//;'admin@tantawancorp.co.th'
	}else if($_POST['mailtype'] == "hr"){
		$sumName = $_POST['firstname']." ".$_POST['lastname']." ".$_POST['phonenumber'];
		$tmpSubject = "[สมัครงาน] ตำแหน่ง ".$_POST['position']." เงินเดือนที่ต้องการ ".$_POST['exspectedSalary'];
		$From = $_POST['emailaddress'];
		$FromName = '=?utf-8?B?'.base64_encode($sumName).'?=';
		$Subject = '=?utf-8?B?'.base64_encode($tmpSubject).'?=';
		$Body = "<br> เรียนผู้บริหารฝ่ายทรัยากรบุคคล <br> รายละเอียดผู้สมัครงาน <br> ชื่อ ".$sumName ;
		$Body .= "<br> ตำแหน่ง ".$_POST['position']." เงินเดือนที่ต้องการ ".$_POST['exspectedSalary'];
		$Body .= "<br> วันเกิด ".$_POST['birthdate']." อายุ ".$_POST['age']." ปี";
		$Body .= "<br> อีเมล์ ".$_POST['emailaddress']." เบอร์ติดต่อ ".$_POST['phonenumber'];
		$Body .= "<br> ที่อยู่ ".$_POST['address'];
		$ToMail = $_POST['toMail'];//;'admin@tantawancorp.co.th'
	}
	//$Browserfile = $_POST['Browserfile'];
	//$Browserfile = realpath($_POST['Browserfile']);
	// $From = $_POST['From'];
	// $FromName = '=?utf-8?B?'.base64_encode($_POST['FromName']).'?=';
	// $Subject = '=?utf-8?B?'.base64_encode($_POST['Subject']).'?=';
	// $Body = $_POST['Body'];
	// $ToMail = 'admin@tantawancorp.co.th';//$_POST['ToMail'];
	
	$mail = new PHPMailer();
	$mail->IsHTML(true);
	$mail->IsSMTP();

  //$mail->SMTPDebug  = 2;
	$mail->SMTPAuth = MAIL_SMTPAuth;//true; // enable SMTP authentication
	$mail->SMTPSecure = MAIL_SMTPSecure;//"ssl"; // sets the prefix to the servier

	$mail->Host = MAIL_HOST;//"smtp.gmail.com"; // sets GMAIL as the SMTP server
	$mail->Port = MAIL_PORT;//465; // set the SMTP port for the GMAIL server
	$mail->Username = MAIL_USERMAIL;// GMAIL username
	$mail->Password = MAIL_PWDMAIL;// GMAIL password
	$mail->From = MAIL_USERMAIL;//$From; // "name@yourdomain.com";
	//$mail->AddReplyTo = "support@thaicreate.com"; // Reply
	$mail->FromName = $FromName;
	$mail->Subject = $Subject;
	$mail->Body = "From Email : ".$From." ".$Body;

	$mail->AddAddress($ToMail, "Hi"); // to Address "admin@tantawancorp.co.th"

	//$mail->AddAttachment($Browserfile);
	if(is_array($_FILES)) {
	$mail->AddAttachment($_FILES['browserfile']['tmp_name'],$_FILES['browserfile']['name']); 
	}
	//$mail->AddAttachment("D:\#Git_JB_591224\Web_Tantawan\#Report\Report_6004.xlsx");

	//$mail->AddCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC
	//$mail->AddBCC("member@thaicreate.com", "Mr.Member ShotDev"); //CC

	$mail->set('X-Priority', '1'); //Priority 1 = High, 3 = Normal, 5 = low
  //echo 'line 32';
	//$mail->Send();
  if(!$mail->Send()){
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
   }else{
		  echo "<div id = 'result'> true </div>";
	}
?>
</body>
</html>
