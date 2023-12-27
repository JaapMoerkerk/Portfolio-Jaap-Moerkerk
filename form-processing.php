<?php
require('./vendor/autoload.php');

use PHPMailer\PHPMailer\PHPMailer;

$credentialsJson = file_get_contents('./credentials.json');
$credentials = json_decode($credentialsJson, true);

if ($credentials === null){
    die('JSON credentials file could not be decoded.');
}

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

    // Credentials from credentials file
    $formEmail = $credentials['mail_server']['username'];
    $recipientEmail = $credentials['mail_server']['recipient_email'];
    $password = $credentials['mail_server']['password'];
    $host = $credentials['mail_server']['host'];
    $recipientName = $credentials['mail_server']['recipient_name'];

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
    $mail->addAddress($recipientEmail, $recipientName);

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


