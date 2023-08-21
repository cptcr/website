<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Pfade müssen entsprechend angepasst werden

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    $mail = new PHPMailer(true);

    try {
        // E-Mail-Einstellungen
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Hier den SMTP-Host eintragen
        $mail->SMTPAuth   = true;
        $mail->Username   = 'reloeq@gmail.com';
        $mail->Password   = 'wettkampf';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // oder PHPMailer::ENCRYPTION_SMTPS
        $mail->Port       = 587; // Port entsprechend anpassen

        // Empfänger
        $mail->setFrom($email, $name);
        $mail->addAddress('reloeq@gmail.com'); // Hier deine E-Mail-Adresse eintragen

        // E-Mail-Inhalt
        $mail->Subject = "Neue Nachricht von $name";
        $mail->Body    = $message;

        $mail->send();
        echo "Vielen Dank für deine Nachricht, $name!";
    } catch (Exception $e) {
        echo "Nachricht konnte nicht gesendet werden. Fehler: {$mail->ErrorInfo}";
    }
} else {
    echo "Ups! Da lief etwas schief.";
}
?>
