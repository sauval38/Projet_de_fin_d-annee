<?php

// Déclaration de l'espace de nom pour la classe AddCharacterModels dans le namespace AdminModels
namespace AdminModels;

// Importation des classes PDO, Exception, et App\Database
use PDO;
use Exception;
use App\Database;

// Déclaration de la classe AddCharacterModels
class AddCharacterModels {
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

    // Méthode pour ajouter un personnage avec une image
    public function addCharacterWithImage($games_id, $names_character, $descriptions_character, $jobs_character, $limits_break_character, $age_character, $armed_character, $size_character, $date_o_birth_character, $place_of_birth_character, $images_character, $path) {
        try {
            // Définition du chemin d'images par défaut
            $path = 'assets/images/';

            // Début d'une transaction pour garantir l'intégrité des données
            $this->db->beginTransaction();

            // Récupération du nom de l'image depuis le tableau $images_character
            $img = $images_character['name'];

            // Définition de la requête SQL pour insérer un nouveau personnage dans la base de données
            $sqlCharacter = "INSERT INTO `character` (
                                games_id,
                                names_character,
                                descriptions_character,
                                jobs_character,
                                limits_break_character,
                                age_character,
                                armed_character,
                                size_character,
                                date_o_birth_character,
                                place_of_birth_character,
                                images_character,
                                path
                            ) VALUES (
                                :games_id,
                                :names_character,
                                :descriptions_character,
                                :jobs_character,
                                :limits_break_character,
                                :age_character,
                                :armed_character,
                                :size_character,
                                :date_o_birth_character,
                                :place_of_birth_character,
                                :images_character,
                                :path
                            )";

            // Convertit la taille en flottant ou en null si elle est vide
            $size_character = !empty($size_character) ? floatval($size_character) : null;
            // Convertit l'âge en entier ou en null si il est vide
            $age_character = !empty($age_character) ? intval($age_character) : null;
            // Assigne null à la date de naissance si elle est vide
            $date_o_birth_character = !empty($date_o_birth_character) ? $date_o_birth_character : null;

            // Préparation de la requête SQL pour insérer le personnage
            $character = $this->db->prepare($sqlCharacter);
            // Association des paramètres aux valeurs correspondantes
            $character->bindParam(':games_id', $games_id);
            $character->bindParam(':names_character', $names_character);
            $character->bindParam(':descriptions_character', $descriptions_character);
            $character->bindParam(':jobs_character', $jobs_character);
            $character->bindParam(':limits_break_character', $limits_break_character);
            $character->bindParam(':age_character', $age_character);
            $character->bindParam(':armed_character', $armed_character);
            $character->bindParam(':size_character', $size_character);
            $character->bindParam(':date_o_birth_character', $date_o_birth_character, PDO::PARAM_NULL);
            $character->bindParam(':place_of_birth_character', $place_of_birth_character);
            $character->bindParam(':images_character', $img);
            $character->bindParam(':path', $path);
            // Exécution de la requête SQL
            $character->execute();

            // Vérification que l'image a bien été téléchargée
            if (isset($images_character) && $images_character['error'] === UPLOAD_ERR_OK) {
                // Récupération du chemin temporaire de l'image
                $imageTmpPath = $images_character['tmp_name'];
                // Récupération du nom de l'image
                $imageName = basename($images_character['name']);
                // Définition du répertoire de téléchargement
                $uploadDir = 'assets/images/';
                // Construction du chemin de l'image finale
                $imagePath = $uploadDir . $imageName;

                // Déplacement du fichier téléchargé vers le répertoire final
                if (move_uploaded_file($imageTmpPath, $imagePath)) {
                    // Message de succès si le personnage a été ajouté avec succès
                    echo "Le personnage a été ajouté avec succès.";
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
