<?php
require_once __DIR__ . '/../extensions/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class ControllerEmail {

    /*=============================================
    SEND EMAIL
    =============================================*/

    static public function ctrSendEmail() {

        if (isset($_POST["email"])) {

            if (preg_match('/^[\p{L}0-9 ]+$/u', $_POST["name"]) &&
                filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) &&
                preg_match('/^[\p{L}0-9 .,!?$%&@#_\-+*()]+$/u', $_POST["subject"]) &&
                preg_match('/^[\p{L}0-9 .,!?$%&@#_\-+*()]+$/u', $_POST["message"])
            ) {
                // Crear una instancia de PHPMailer
                $mail = new PHPMailer(true);

                try {
                    $name = $_POST['name'] ?? '';
                    $email = $_POST['email'] ?? '';
                    $subject = $_POST['subject'] ?? '';
                    $message = $_POST['message'] ?? '';

                    // Configuración del servidor SMTP
                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com'; // Cambia esto por tu servidor SMTP
                    $mail->SMTPAuth = true;
                    $mail->Username = 'kelvin.jimenez@gmail.com'; // Tu correo electrónico
                    $mail->Password = 'yklv fras icvx ojbi'; // Tu contraseña
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    // Habilita la depuración
                    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    $mail->SMTPDebug = 0;
                    $mail->Debugoutput = 'html';

                    // Configuración del correo
                    $mail->setFrom($email, $name);
                    $mail->addAddress('kelvin.jimenez@gmail.com', 'Kelvin Jimenez'); // Destinatario
                    $mail->addReplyTo($email, $name);

                    // Contenido del correo
                    $mail->isHTML(true);
                    $mail->Subject = $subject;
                    $mail->Body = "<h2>Contact Form Submission</h2>
                                   <p><strong>Name:</strong> $name</p>
                                   <p><strong>Email:</strong> $email</p>
                                   <p><strong>Subject:</strong> $subject</p>
                                   <p><strong>Message:</strong><br>$message</p>";
                    $mail->AltBody = $message;

                    $mail->send();

                    return 'ok';
                } catch (Exception $e) {
                    return "error: " . $mail->ErrorInfo; // Devuelve el mensaje de error detallado
                }
            } else {
                return "error.sintaxis"; // Error en la validación
            }
        }

        return "error"; // Si no se envió el formulario correctamente
    }
}