<?php

namespace Models;  // Le modèle ContactModels appartient à l'espace de noms Models

use App\Database;  // Importation de la classe Database pour gérer la connexion à la base de données

class ContactModels {
    protected $db;  // Déclaration d'une propriété pour stocker la connexion à la base de données

    // Le constructeur crée une instance de la classe Database et récupère la connexion à la base de données
    public function __construct() {
        $database = new Database();  // Création d'une instance de la classe Database
        $this->db = $database->getConnection();  // Récupère la connexion et l'affecte à la propriété $db
    }

    // Méthode pour enregistrer un message de contact dans la base de données
    public function sendMessageContact() {
        // Requête SQL pour insérer les informations de contact dans la table 'contact'
        $sqlMessage = "INSERT INTO contact (name, email, subject, message) VALUES (:name, :email, :subject, :message)";
        
        // Préparation de la requête SQL pour la sécurité (protection contre les injections SQL)
        $message = $this->db->prepare($sqlMessage);
    
        // Récupération des données envoyées via POST (nom, email, sujet, message)
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $subject = $_POST['subject'] ?? null;
        $messageContent = $_POST['message'] ?? null;
    
        // Si tous les champs sont remplis, on les lie à la requête SQL préparée
        if ($name && $email && $subject && $messageContent) {
            // Bind des paramètres de la requête avec les valeurs récupérées via POST
            $message->bindParam(':name', $name);
            $message->bindParam(':email', $email);
            $message->bindParam(':subject', $subject);
            $message->bindParam(':message', $messageContent);
    
            // Exécution de la requête et retour du résultat (true si succès, false sinon)
            return $message->execute();
        } else {
            // Si l'un des champs est manquant, une exception est levée
            throw new \Exception("Tous les champs sont obligatoires.");
        }
    }
}
