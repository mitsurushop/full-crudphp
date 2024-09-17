<?php
use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader
require 'vendor/autoload.php';
$mail = new PHPMailer(true);

//server settings
$mail->SMTPDebug = 2;                                           //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'reyhanabyakta@gmail.com';                     //SMTP username
    $mail->Password   = 'secret';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


        //Recipients
        $mail->setFrom('reyhanabyakta@gmail.com', 'CRUD PHP');
        $mail->addAddress($_POST['email_penerima']);     //Penerima
        $mail->addReplyTo('reyhanabyakta@gmail.com', 'CRUD PHP');

        $mail->Subject = $_POST['subject'];
        $mail->Body    = $_POST['pesan'];

        if ($mail->send()) {
                    echo "<script>
                           alert('Email Berhasil Dikirimkan');
                           document.location.href = 'email.php';
                          </script>";
                } else {
                    echo "<script>
                           alert('Email Gagal Dikirimkan');
                           document.location.href = 'email.php';
                          </script>";
                }