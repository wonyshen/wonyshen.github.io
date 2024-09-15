<?php
require_once 'vendor/autoload.php';
$name = $_POST['name'];
$company = $_POST['company'];
$email = $_POST['email'];
$message = $_POST['message'];
$heard_about_us = $_POST['how-heard-about-us'];
$project_budget = $_POST['project-budget'];
$project_timeline = $_POST['project-timeline'];
$preferred_method_of_contact = $_POST['preferred-method-of-contact'];

$msg = "<p>Name: $name</p><p>Company: $company</p><p>Email: $email</p> <p>Heard About Us Through: $heard_about_us</p> <p>Message: $message</p> <p>Project Budget: $project_budget</p> <p>Project Timeline: $project_timeline</p> <p>Preferred Method of Contact: $preferred_method_of_contact</p>";


// set up email server here
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername('hello@natthandavis.com')
    ->setPassword('F0xT4il!');

$mailer = new Swift_Mailer($transport);

$message = (new Swift_Message($subject))
    ->setFrom(['hello@natthandavis.com' => 'Nathaniel Davis'])
    ->setTo([$email])
    ->setBody($msg, 'text/html');

$result = $mailer->send($message);

// log email here
error_log("Email result: " . ($result ? 'sent' : 'failed') . "\n", 3, 'email.log');

header('Location: /');
exit;