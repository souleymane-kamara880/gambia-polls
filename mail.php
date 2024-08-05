<?php

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//required files
require 'phpmailer-master/src/Exception.php';
require 'phpmailer-master/src/PHPMailer.php';
require 'phpmailer-master/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
if (isset($_POST["send"])) {

  $name=isset($_POST['name'])?$_POST['name']:"";
  $email=isset($_POST['email'])?$_POST['email']:"";
  $number=isset($_POST['number'])?$_POST['number']:"";
  $message=isset($_POST['message'])?$_POST['message']:"";

  $suject = "Vous avez reçu un message de : ".$email;

  $message = "
  <p>Vous avez reçu un message de <strong>".$email."</strong></p>
  <p><strong>Nom :</strong>".$name."</p>
  <p><strong>number :</strong>".$number."</p>
  <p><strong>message :</strong>".$message."</p>
  ";

  $mail = new PHPMailer(true);

    //Server settings
    $mail->isSMTP();                              //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;             //Enable SMTP authentication
    $mail->Username   = 'souleymanekamara4@gmail.com';   //SMTP write your email
    $mail->Password   = 'oimyyyxzbxrywdih';      //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit SSL encryption
    $mail->Port       = 465;                                    

    //Recipients
    $mail->setFrom( $_POST["email"], $_POST["name"]); // Sender Email and name
    $mail->addAddress('etudsouleymane90@gmail.com');     //Add a recipient email  
    $mail->addReplyTo($_POST["email"], $_POST["name"]); // reply to sender email

    //Content
    $mail->isHTML(true);               //Set email format to HTML
    $mail->Subject = "you have a new message from";   // email subject headings
    $mail->Body    = $_POST["message"]; //email message

    // Success sent message alert
    $mail->send();
    echo
    " 
    <script> 
     alert('Message was sent successfully!');
     document.location.href = 'contact.html';
    </script>
    ";
}
?>