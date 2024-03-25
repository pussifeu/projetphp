<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  use PHPMailer\PHPMailer\SMTP;
  
  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php';

  $mail = new PHPMailer(true);

  $mail->isSMTP(); //specification du serveur smtp
  $mail->Host = 'smtp.gmail.com'; //specifier le serveur mail
  $mail->SMTPAuth = true; //active l'authentifcation
  $mail->Username = 'herihasinamichael@gmail.com';
  $mail->Password = 'herihasinam1221';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587; 
  $mail->CharSet = "utf-8";

  $mail->setForm('herihasinamichael@gmail.com' , 'Michael');
  $mail->addAddress($adr_email , $exmne_fullname);
  $mail->isHTML(true); //pour activer l'envoi de mail sous forme html

  $mail->Subject = "Note de l'examen QCM";
  $mail->Body = "Bonjour! Le resultat de votre examen QCM est de : $score / $over  ";

  $mail->SMTPDebug = 0; //pour desactiver le debug

  //Envoi de l'email
if(!$mail->send()){
    $message = "Mail non envoyé";
    echo 'Erreur:' .$mail->ErrorInfo;
} else{
    $message = "Un mail vous a été envoyé!";
    echo $message;
}


?>