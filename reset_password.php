<?php
include './connection.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// Gerekli dosyaları include ediyoruz
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

if (!isset($_POST['resetEmail'])) {
    header('Location: ./index.php?no-mail');
}

function randomPassword()
{
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass);
}

$mail = new PHPMailer(true);

$mail_to = mysqli_real_escape_string($conn, $_POST['resetEmail']);

$new_password = randomPassword();
$hashed_password = sha1($new_password);

$sql = "UPDATE users SET password = '$hashed_password' WHERE  email = '$mail_to'";
$result = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) == 0) {
    header('Location: ./index.php?fail');
}

try {
    $mail->SMTPDebug = 0;
    $mail->isSMTP();
    $mail->Host       = 'mail.smartgarbage1108.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'info@smartgarbage1108.com';
    $mail->Password   = 'admin_smartgarbage1108';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;
    $mail->setFrom('info@smartgarbage1108.com', 'Smart Garbage');

    $mail->addAddress($mail_to, 'Smart Garbage User');

    $mail->isHTML(true);
    $mail->CharSet = 'utf-8';
    $mail->Subject = 'Password Reset';
    $mail->Body    = 'Hello, here is your new password <b> ' . $new_password . '</b>';

    $mail->send();

    header('Location: ./index.php?success');
} catch (Exception $e) {
    echo "Ops! Email iletilemedi. Hata: {$mail->ErrorInfo}";
    header('Location: ./index.php?no-mail');
}
