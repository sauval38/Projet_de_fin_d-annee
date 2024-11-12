<?php
namespace App;

use PDO; // Importation de la classe PDO pour la gestion des bases de données
use PDOException; // Importation de l'exception PDOException pour la gestion des erreurs

class Database {
    protected $cnx; // Propriété qui contiendra l'objet PDO une fois la connexion établie
    protected $host = 'localhost'; // Adresse de l'hôte de la base de données MySQL
    protected $db = 'qcqc_charles'; // Nom de la base de données
    protected $login = 'qcqc_dev'; // Nom d'utilisateur pour la connexion à la base de données
    protected $pw = 'tralalapouetpouet'; // Mot de passe pour la connexion à la base de données
    // protected $db = 'final-fantasy'; // Nom de la base de données
    // protected $login = 'root'; // Nom d'utilisateur pour la connexion à la base de données
    // protected $pw = 'root'; // Mot de passe pour la connexion à la base de données

    public function __construct() {
        try {
            // Tentative de connexion à la base de données MySQL en utilisant PDO
            $this->cnx = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->login, $this->pw);

            // Configuration de PDO pour qu'il lance des exceptions en cas d'erreur
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Configuration du mode de récupération par défaut des données sous forme de tableaux associatifs
            $this->cnx->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // En cas d'échec de la connexion, enregistrement de l'erreur dans le fichier de log
            error_log('Connection failed: ' . $e->getMessage());
            
            // Lancer une nouvelle PDOException pour signaler l'erreur avec le message et le code d'erreur d'origine
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    // Méthode pour récupérer l'objet PDO qui représente la connexion à la base de données
    public function getConnection() {
        return $this->cnx;
    }
}
?>