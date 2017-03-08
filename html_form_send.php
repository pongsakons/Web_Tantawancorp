<?php
/* if(isset($_POST['email'])) {

    // CHANGE THE TWO LINES BELOW
    $email_to = "admin@tantawancorp.co.th";

    $email_subject = "website html form submissions";


    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }

    // validation expected data exists
    if(!isset($_POST['first_name']) ||
        !isset($_POST['last_name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['telephone']) ||
        !isset($_POST['comments'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $first_name = $_POST['first_name']; // required
    $last_name = $_POST['last_name']; // required
    $email_from = $_POST['email']; // required
    $telephone = $_POST['telephone']; // not required
    $comments = $_POST['comments']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }
  if(!preg_match($string_exp,$last_name)) {
    $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
  }
  if(strlen($comments) < 2) {
    $error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
    died($error_message);
  }
    $email_message = "Form details below.\n\n";

    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

    $email_message .= "First Name: ".clean_string($first_name)."\n";
    $email_message .= "Last Name: ".clean_string($last_name)."\n";
    $email_message .= "Email: ".clean_string($email_from)."\n";
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Comments: ".clean_string($comments)."\n";


// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>

<!-- place your own success html below -->

Thank you for contacting us. We will be in touch with you very soon.

<?php
}
die();
*/
?>


<?php
	// $strTo = $_POST["txtTo"];
	// $strSubject = $_POST["txtSubject"];
	// $strHeader = "Content-type: text/html; charset=windows-874\r\n"; // or UTF-8 //
	// $strHeader .= "From: ".$_POST["txtFormName"]."<".$_POST["txtFormEmail"].">\r\nReply-To: ".$_POST["txtFormEmail"]."";
	// $strMessage = nl2br($_POST["txtDescription"]);
  // $headers = 'From: lljobzll@gmail.com' . "\r\n" .
  //   'Reply-To: admin@tantawancorp.co.th' . "\r\n" .
  //   'X-Mailer: PHP/' . phpversion();
	// $flgSend = @mail('admin@tantawancorp.co.th','data','strMessage',$headers);  // @ = No Show Error //
	// if($flgSend)
	// {
	// 	echo "Email Sending.";
	// }
	// else
	// {
	// 	echo "Email Can Not Send.";
	// }

	/***
	Server SMTP/POP : mail.thaicreate.com
	Email Account : webmaster@thaicreate.com
	Password : 123456
	*/
$message_body  ='admin send';
	require_once('PHPMailer-master/class.phpmailer.php');
 require_once("PHPMailer-master/class.smtp.php");
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        try {
            $mail->Encoding = "quoted-printable";
            $mail->CharSet = "UTF-8";

            // send mail by gmail
            $mail->Host = 'ssl://smtp.gmail.com'; // กำหนดค่าเป็นที่ gmail ได้เลยครับ
           $mail->Port = 465; // กำหนด port เป็น 465 ตามที่ google บอกครับ
           $mail->SMTPAuth = true; // กำหนดให้มีการตรวจสอบสิทธิ์การใช้งาน
           $mail->Username = 'lljobzll@gmail.com'; // ต้องมีเมล์ของ gmail ที่สมัครไว้ด้วยนะครับ
           $mail->Password = '12345pongsakons'; // ใส่ password ที่เราจะใช้เข้าไปเช็คเมล์ที่ gmail ล่ะครับ
           $mail->From = 'name'; // ใครเป็นผู้ส่ง ใส่ชื่อเราหรือชื่ออะไรก็ได้ครับ เพื่อให้คนรับเค้ารู้ว่าใครส่งมา
           $mail->FromName = 'name1'; // ชื่อผู้ส่ง คล้ายกับตัวบนนั้นแหละครับ
           $mail->Subject  = "subject"; // กำหนดชื่อเรื่องครับ
           $mail->Body     =  'phpmailer by gmail'; // ใส่ข้อความที่ต้องการส่งเข้าไปครับ
           $mail->AltBody =  $message_body;
           $mail->AddAddress('admin@tantawancorp.co.th'); // เมลล์ของคนที่เราจะส่งไปให้ครับ
           $mail->Send();
        }
        catch (phpmailerException $e) {
            echo $e->errorMessage(); //Pretty error messages from PHPMailer
        }
        catch (Exception $e) {
            echo $e->getMessage(); //Boring error messages from anything else!
        }
?>
<a href="mailto:youremailaddress">Email Me</a>
Thank you for contacting us. We will be in touch with you very soon.
