<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    $to = "toowake@proton.me";
    $subject = "Contacted by $name";
    $headers = "From: $email";

    mail($to, $subject, $message, $headers);
    
    echo "Message send!";
}
?>