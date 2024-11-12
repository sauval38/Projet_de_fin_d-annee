<?php

// Déclaration de l'espace de nom pour la classe AddBossModels dans le namespace AdminModels
namespace AdminModels;

// Importation des classes PDO, Exception, et App\Database
use PDO;
use Exception;
use App\Database;

// Déclaration de la classe AddBossModels
class AddBossModels {
    // Déclaration de la propriété protégée $db pour stocker la connexion à la base de données
    protected $db;

    // Constructeur de la classe pour initialiser la connexion à la base de données
    public function __construct() {
        // Création d'une instance de la classe Database
        $database = new Database();
        // Récupération de la connexion et affectation à la propriété $db
        $this->db = $database->getConnection();
    }

    // Méthode pour récupérer les titres de la table "games"
    public function getTitles() {
        // Préparation de la requête SQL pour sélectionner les colonnes id et titles_article
        $sqlTitles = $this->db->prepare('SELECT id, titles_article FROM games');
        // Exécution de la requête SQL
        $sqlTitles->execute();
        // Retourne toutes les lignes trouvées sous forme de tableau associatif
        return $sqlTitles->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthode pour ajouter un boss avec une image
    public function addBossWithImage($games_id, $name_boss, $descriptions_boss, $HP_boss, $MP_boss, $loots_boss, $weakness_boss, $location_boss, $gils_boss, $experiences_boss, $images_boss, $path) {
        try {
            // Définition du chemin d'images par défaut
            $path = 'assets/images/';

            // Début d'une transaction pour garantir l'intégrité des données
            $this->db->beginTransaction();

            // Récupération du nom de l'image depuis le tableau $images_boss
            $img = $images_boss['name'];

            // Assignation de valeurs NULL aux variables si elles sont vides
            $MP_boss = !empty($MP_boss) ? $MP_boss : NULL;
            $HP_boss = !empty($HP_boss) ? $HP_boss : NULL;
            $gils_boss = !empty($gils_boss) ? $gils_boss : NULL;
            $experiences_boss = !empty($experiences_boss) ? $experiences_boss : NULL;

            // Définition de la requête SQL pour insérer un nouveau boss dans la base de données
            $sqlBoss = "INSERT INTO boss (games_id, name_boss, descriptions_boss, HP_boss, MP_boss, loots_boss, weakness_boss, location_boss, gils_boss, experiences_boss, images_boss, path) VALUES (:games_id, :name_boss, :descriptions_boss, :HP_boss, :MP_boss, :loots_boss, :weakness_boss, :location_boss, :gils_boss, :experiences_boss, :images_boss, :path)";

            // Préparation de la requête SQL
            $boss = $this->db->prepare($sqlBoss);
            // Association des paramètres aux valeurs correspondantes
            $boss->bindParam(':games_id', $games_id);
            $boss->bindParam(':name_boss', $name_boss);
            $boss->bindParam(':descriptions_boss', $descriptions_boss);
            $boss->bindParam(':HP_boss', $HP_boss, PDO::PARAM_INT);
            $boss->bindParam(':MP_boss', $MP_boss, PDO::PARAM_INT);
            $boss->bindParam(':loots_boss', $loots_boss);
            $boss->bindParam(':weakness_boss', $weakness_boss);
            $boss->bindParam(':location_boss', $location_boss);
            $boss->bindParam(':gils_boss', $gils_boss, PDO::PARAM_INT);
            $boss->bindParam(':experiences_boss', $experiences_boss, PDO::PARAM_INT);
            $boss->bindParam(':images_boss', $img);
            $boss->bindParam(':path', $path);
            // Exécution de la requête SQL
            $boss->execute();

            // Vérification que l'image a bien été téléchargée
            if (isset($images_boss) && $images_boss['error'] === UPLOAD_ERR_OK) {
                // Récupération du chemin temporaire de l'image
                $imageTmpPath = $images_boss['tmp_name'];
                // Récupération du nom de l'image
                $imageName = basename($images_boss['name']);
                // Définition du répertoire de téléchargement
                $uploadDir = 'assets/images/';
                // Construction du chemin de l'image finale
                $imagePath = $uploadDir . $imageName;

                // Déplacement du fichier téléchargé vers le répertoire final
                if (move_uploaded_file($imageTmpPath, $imagePath)) {
                    // Message de succès si le boss a été ajouté avec succès
                    echo "Le boss a été ajouté avec succès.";
                } 
            }
            // Validation de la transaction
            $this->db->commit();
        } 
        // En cas d'erreur, annulation de la transaction et renvoi de l'exception
        catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }  
}      
