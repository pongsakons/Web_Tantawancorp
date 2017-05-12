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
	$From = $_POST['From'];
	$FromName = '=?utf-8?B?'.base64_encode($_POST['FromName']).'?=';
	$Subject = '=?utf-8?B?'.base64_encode($_POST['Subject']).'?=';
	$Body = $_POST['Body'];
	$ToMail = $_POST['ToMail'];
	$Browserfile = $_POST['Browserfile'];
	//$Browserfile = realpath($_POST['Browserfile']);
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
	//$mail->AddAttachment("D:\#Git_JB_591224\Web_Tantawan\#Report\Report_6004.xlsx");
	$file_attached = false;
    if(isset($_FILES['Browserfile'])) //check uploaded file
    {
        //get file details we need
        $file_tmp_name    = $_FILES['Browserfile']['tmp_name'];
        $file_name        = $_FILES['Browserfile']['name'];
        $file_size        = $_FILES['Browserfile']['size'];
        $file_type        = $_FILES['Browserfile']['type'];
        $file_error       = $_FILES['Browserfile']['error'];
 
        ////exit script and output error if we encounter any
        // if($file_error>0)
        // {
        //     $mymsg = array(
        //     1=>"The uploaded file exceeds the upload_max_filesize directive in php.ini",
        //     2=>"The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
        //     3=>"The uploaded file was only partially uploaded",
        //     4=>"No file was uploaded",
        //     6=>"Missing a temporary folder" );
             
        //     $output = json_encode(array('type'=>'error', 'text' => $mymsg[$file_error]));
        //     die($output);
        // }
         
        //read from the uploaded file & base64_encode content for the mail
        $handle = fopen($file_tmp_name, "r");
        $content = fread($handle, $file_size);
        fclose($handle);
        $encoded_content = chunk_split(base64_encode($content));
        //now we know we have the file for attachment, set $file_attached to true
        $file_attached = true;
    }
		//$mail->AddAttachment($encoded_content);
		$mail->AddAttachment($Browserfile);
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
