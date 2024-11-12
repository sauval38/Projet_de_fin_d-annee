<?php

// Déclare un namespace pour organiser la classe ContactController
namespace Controllers;

// Importation des classes nécessaires
use Exception;  // Pour gérer les exceptions
use Views\ContactViews;  // Pour afficher la vue de contact
use Models\ContactModels;  // Pour gérer la logique de contact
use PHPMailer\PHPMailer\PHPMailer;  // Pour envoyer des emails via PHPMailer

// Définition de la classe ContactController
class ContactController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $contactModels;
    protected $contactViews;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de ContactViews pour afficher le formulaire de contact
        $this->contactViews = new ContactViews();
        // Création d'une instance de ContactModels pour gérer les actions liées au contact
        $this->contactModels = new ContactModels();
    }

    // Méthode pour afficher la vue de contact (formulaire)
    public function contactController() {
        // Affiche la vue du formulaire de contact
        $this->contactViews->contact();
    }

    // Méthode pour envoyer un message de contact via email
    public function sendMessage() {
        // Appelle la méthode sendMessageContact() du modèle pour traiter les données du formulaire
        $this->contactModels->sendMessageContact();

        // Crée une instance de PHPMailer pour envoyer l'email
        $mail = new PHPMailer(true);

        try {
            // Configure PHPMailer pour utiliser SMTP
            $mail->isSMTP();
            $mail->Host       = 'smtp.office365.com'; // Serveur SMTP d'Outlook
            $mail->SMTPAuth   = true;
            $mail->Username   = 'boubou601@live.fr'; // L'adresse email d'envoi (ici un email Outlook)
            $mail->Password   = 'lionnais1990'; // Le mot de passe de l'email (à éviter en clair)
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Utilisation du cryptage TLS
            $mail->Port       = 587; // Port SMTP sécurisé pour Outlook
        
            // Définition de l'adresse de l'expéditeur et du nom
            $mail->setFrom('votre-adresse-email@outlook.com', 'Votre Nom ou Site');
            // Définition de l'adresse du destinataire (celle fournie dans le formulaire)
            $mail->addAddress($_POST['email'], $_POST['name']);
        
            // Définition du format HTML pour le message
            $mail->isHTML(true);
            // Sujet du message
            $mail->Subject = 'New Contact Message';
            // Corps du message (provenant du champ "message" du formulaire)
            $mail->Body    = $_POST['message'];
        
            // Envoie le message
            $mail->send();
            // Message de succès après l'envoi du mail
            echo '<h2>Message envoyé avec succès !</h2>';
        } catch (Exception $e) {
            // En cas d'erreur, affiche le message d'erreur
            echo "<h2>Une erreur s'est produite lors de l'envoi du mail : </h2>" . $mail->ErrorInfo;
        }  
    }
}
