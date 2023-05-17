<?php
#require_once('../assets/vendor/phpmailer/phpmailer/src/PHPMailer.php');
use PHPMailer\PHPMailer\PHPMailer;

$receiving_email_address = 'fernanddev@hotmail.com';

$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$mail = new PHPMailer;
$mail->isSMTP();
$mail->Host = 'smtp.live.com'; // Cambiar al servidor SMTP de su proveedor de correo electrónico
$mail->SMTPAuth = true;
$mail->Username = 'fernanddev@hotmail.com'; // Cambiar al correo electrónico del remitente
$mail->Password = 'Master117+'; // Cambiar a la contraseña del remitente
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom($email, $name);
$mail->addAddress($receiving_email_address);
$mail->addReplyTo($email, $name);

$mail->Subject = $subject;
$mail->Body    = $message;

if(!$mail->send()) {
    echo 'El mensaje no pudo ser enviado.';
    echo 'Error del Mailer: ' . $mail->ErrorInfo;
} else {
    echo 'El mensaje ha sido enviado.';
}
?>
