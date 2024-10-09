<?php

namespace Models;

use App\Database;

class ContactModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function sendMessageContact() {
        $sqlMessage = "INSERT INTO contact (name, email, subject, message) VALUES (:name, :email, :subject, :message)";
        $message = $this->db->prepare($sqlMessage);
    
        $name = $_POST['name'] ?? null;
        $email = $_POST['email'] ?? null;
        $subject = $_POST['subject'] ?? null;
        $messageContent = $_POST['message'] ?? null;
    
        if ($name && $email && $subject && $messageContent) {
            $message->bindParam(':name', $name);
            $message->bindParam(':email', $email);
            $message->bindParam(':subject', $subject);
            $message->bindParam(':message', $messageContent);
    
            return $message->execute();
        } else {
            throw new \Exception("Tous les champs sont obligatoires.");
        }
    }
}