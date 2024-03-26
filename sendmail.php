<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendEmail($recipient, $score, $over, $exmne_fullname, $percent, $examenTitle)
{
    // Create a new PHPMailer instance
    $mail = new PHPMailer(true);

    $mail->isSMTP(); //specification du serveur smtp
    $mail->Host = 'smtp.gmail.com'; //specifier le serveur mail
    $mail->SMTPAuth = true; //active l'authentifcation
    $mail->Username = 'testsmt9000@gmail.com';
    $mail->Password = 'pmvr vyaw aenw dzaz';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->CharSet = "utf-8";

    $mail->setFrom('testsmt9000@gmail.com', 'Herihasina Michael RAKOTOARIVONY');
    $mail->addAddress($recipient, $exmne_fullname);
    $mail->isHTML(true); //pour activer l'envoi de mail sous forme html

    $mail->Subject = "Note de l'examen QCM";
    $mail->Body = "Bonjour $exmne_fullname. <br> Le resultat de votre examen QCM de <b>$examenTitle</b>  est de : <b>$percent%</b> avec une score de <b>$score/$over </b> <br> <br> Cordialement, <br> L'équipe QCM";

    $mail->SMTPDebug = 0; //pour desactiver le debug
    // Send email
    // Send email
    if ($mail->send()) {
        return true;
    } else {
        echo 'Error: ' . $mail->ErrorInfo;
    }
}

?>