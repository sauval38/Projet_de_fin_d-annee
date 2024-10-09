<?php

namespace Controllers;

use Exception;
use Views\ContactViews;
use Models\ContactModels;
use PHPMailer\PHPMailer\PHPMailer;

class ContactController {
    protected $contactModels;
    protected $contactViews;

    public function __construct() {
        $this->contactViews = new ContactViews();
        $this->contactModels = new ContactModels();
    }

    public function contactController() {
        $this->contactViews->contact();
    }

    public function sendMessage() {
        $this->contactModels->sendMessageContact();

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth   = true;
            $mail->Username   = '5c53e815d0a8dd';
            $mail->Password   = 'b1c95af9290d38'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 2525;

            $mail->setFrom('no-reply@yourwebsite.com', 'Votre Site');
            $mail->addAddress($_POST['email'], $_POST['name']);

            $mail->isHTML(true);
            $mail->Subject = 'New Contact Message';
            $mail->Body    = $_POST['message'];


            $mail->send();
            echo '<h2>Message envoyer avec succes!</h2>';
        } catch (Exception $e) {
            echo "<h2>Une erreur s'est produite lors de l'envoi du mail : </h2>" . $e->getMessage();
        }
    }
}
