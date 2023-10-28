<?php 
use PHPMailer\PHPMailer\PHPMailer;

require_once('includes/Exception.php');
require_once('includes/PHPMailer.php');
require_once('includes/SMTP.php');

$mail = new PHPMailer(true);

try{
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp-mail.outlook.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587; 
    $mail->Username = 'totoleschamps@outlook.fr';
    $mail->Password = 'Lolita5300';

    $mail->setFrom('totoleschamps@outlook.fr'); //adresse mail de l'expéditeur
    $mail->addAddress('nathan.ropert@gmail.com'); //adresse mail du destinataire
    $mail->isHTML(true); //mail au format HTML
    $mail->Subject = 'demande de rdv'; //sujet du mail
    $mail->Body = 'Jespère que vous allez bien. Je vous écris pour solliciter';
    $mail->send();
}catch(Exception){
    echo 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}';
}
?>