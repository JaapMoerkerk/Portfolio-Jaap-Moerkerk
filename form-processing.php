<?php
require('./vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;

session_start();

if (isset($_POST["submit"]) && !empty($_POST["fullname"])) {
    // Getting form submission details through HTTP post request
    $fullname = $_POST["fullname"];
    $tel = $_POST["tel"] ?? "";
    $email = $_POST["email"] ?? "";
    $_SESSION["email"] = $_POST["email"];
    $message = $_POST["message"] ?? "";

    // Mail strings
    $subject = "jaapmoerkerk.nl: new message from $fullname, $email";
    $body = "Contact form jaapmoerkerk.nl
        Message from $fullname
        E-mail from $email
        Phone number: $tel
        Message: $message";

    // Global use vars
    $formEmail = "form@jaapmoerkerk.nl";
    $recipientEmail = "jaapiemoerkerk@hotmail.com";
    $password = "Minimormel";
    $host = "ams42.siteground.eu";

    // SMTP server authentication (SiteGround.com)
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = $host;
    $mail->Username = $formEmail;
    $mail->Password = $password;
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Constructing and sending mail
    $mail->setFrom($formEmail, $fullname);
    $mail->addAddress($recipientEmail, "Jaap Moerkerk");

    $mail->Subject = $subject;
    $mail->Body = $body;

    try {
        $mail->send();
        $_SESSION['form_submitted'] = true;
        $_SESSION['email'] = $email;
    } catch (Exception $e) {
        $_SESSION['form_error'] = true;
    }
    // Redirect back to the original page
}
header("Location: index.php");
exit();


