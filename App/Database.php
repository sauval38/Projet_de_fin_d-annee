<?php
namespace App; // Définit un espace de noms pour cette classe

class Database { // Début de la déclaration de la classe Database
    protected $cnx; // Propriété protégée pour la connexion PDO
    protected $host = 'localhost'; // Hôte de la base de données
    protected $db = 'final-fantasy'; // Nom de la base de données
    protected $login = 'root'; // Nom d'utilisateur de la base de données
    protected $pw = 'root'; // Mot de passe de la base de données

    public function __construct() { // Constructeur de la classe
        // Crée une nouvelle instance de PDO pour la connexion à la base de données
        $this->cnx = new \PDO("mysql:host=$this->host;dbname=$this->db", $this->login, $this->pw);
        
        // Configure le mode d'erreur pour lancer des exceptions en cas d'erreur
        $this->cnx->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getConnection() { // Méthode publique pour obtenir la connexion PDO
        return $this->cnx; // Retourne l'objet de connexion PDO
    }
}
?>
