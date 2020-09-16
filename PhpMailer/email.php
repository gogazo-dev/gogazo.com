<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer\Exception.php';
require 'PHPMailer\PHPMailer.php';
require 'PHPMailer\SMTP.php';


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$mensaje = $_POST['mensaje'];

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
  //  $mail->SMTPDebug = SMTP::DEBUG_SERVER;   
    $mail->SMTPDebug =0;                     // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'info.gogazo@gmail.com';                     // SMTP username
    $mail->Password   = 'gogazo.com';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom($correo, $nombre);
    $mail->addAddress('info.gogazo@gmail.com', 'Gogazo');     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'CLIENTE INTERESADO';
    $mail->Body= $mensaje. "<br>Teléfono: ".$telefono. "<br>Correo: ".$correo;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
   echo '
        El mensaje se envió correctamente
        ';
    header("Location: https://gogazo.com/");
} catch (Exception $e) {
    echo "Hubo un problema al enviar el mensaje: {$mail->ErrorInfo}";
}
?>