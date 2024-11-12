<?php

namespace AdminModels;

use Exception;  // Importation de la classe Exception pour gérer les erreurs
use App\Database;  // Importation de la classe Database pour la gestion de la connexion à la base de données

class ModifyCharacterModels {
    protected $db;  // Déclaration de la propriété pour stocker la connexion à la base de données

    // Le constructeur crée une instance de la classe Database et récupère la connexion à la base de données
    public function __construct() {
        $database = new Database();  // Création d'une instance de la classe Database
        $this->db = $database->getConnection();  // Récupère la connexion et l'affecte à la propriété $db
    }

    // Méthode pour récupérer les informations d'un personnage spécifique par son ID
    public function modify($characterId) {
        // Requête SQL pour sélectionner le personnage avec un identifiant spécifique
        $sqlModifyCharacter = "SELECT * FROM `character` WHERE id = ?";  
        
        // Préparation de la requête pour éviter les injections SQL
        $modifyCharacter = $this->db->prepare($sqlModifyCharacter);  
        
        // Exécution de la requête avec le paramètre d'identifiant du personnage
        $modifyCharacter->execute([$characterId]);  
        
        // Retourne la première ligne de résultats sous forme de tableau associatif
        return $modifyCharacter->fetch();  
    }

    // Méthode pour mettre à jour un personnage dans la base de données
    public function update() {
        try {
            // Démarre une transaction pour garantir que toutes les requêtes sont exécutées avec succès
            $this->db->beginTransaction();  

            // Récupération de l'ID du personnage depuis les données POST
            $characterId = $_POST['id_character'] ?? null;  
            if (!$characterId) {
                // Si l'ID du personnage n'est pas fourni, une exception est lancée
                throw new Exception("L'ID du personnage n'est pas fourni.");
            }

            // Récupère les informations actuelles du personnage
            $currentGame = $this->modify($characterId);  

            // Requête SQL pour mettre à jour les informations du personnage dans la base de données
            $sqlUpdate = "UPDATE `character` SET
                names_character = ?,
                descriptions_character = ?,
                jobs_character = ?,
                age_character = ?,
                armed_character = ?,
                size_character = ?,
                date_o_birth_character = ?,
                place_of_birth_character = ?,
                images_character = ?,
                path = ? 
            WHERE id = ?";  

            // Préparation de la requête d'update
            $update = $this->db->prepare($sqlUpdate);  

            // Récupère le fichier image envoyé pour le personnage, si présent
            $images_article = $_FILES["images_path"] ?? null;  
            $path = "assets/images/";  // Le répertoire où l'image sera stockée
            $imageName = $currentGame['images_character'] ?? '';  // Récupère le nom actuel de l'image, si elle existe

            // Si une nouvelle image est téléchargée
            if ($images_article && $images_article['error'] === UPLOAD_ERR_OK) {
                $imageTmpPath = $images_article['tmp_name'];  // Chemin temporaire du fichier téléchargé
                $imageName = basename($images_article['name']);  // Extraire le nom du fichier de l'image
                $imagePath = $path . $imageName;  // Créer le chemin complet de l'image

                // Déplace l'image téléchargée vers le répertoire spécifié
                if (!move_uploaded_file($imageTmpPath, $imagePath)) {
                    // Si le déplacement échoue, une exception est lancée
                    throw new Exception("Échec du téléchargement de l'image.");
                }
            }

            // Récupère et formate la date de naissance si elle est présente
            $date_o_birth = !empty($_POST['date_o_birth']) ? $_POST['date_o_birth'] : null;
            if ($date_o_birth) {
                // Formate la date en 'Y-m-d H:i:s'
                $date_o_birth = date('Y-m-d H:i:s', strtotime($date_o_birth));  
            }

            // Vérifie si l'âge est fourni et s'il est numérique
            $age = isset($_POST['age']) && is_numeric($_POST['age']) ? (int) $_POST['age'] : null;
    
            // Vérifie si la taille est fournie et si elle est numérique
            $size = isset($_POST['size']) && is_numeric($_POST['size']) ? $_POST['size'] : null;

            // Exécute la mise à jour des informations du personnage avec les nouvelles données
            $update->execute([
                $_POST['names'],  // Nom du personnage
                $_POST['descriptions'],  // Description du personnage
                $_POST['jobs'],  // Profession du personnage
                $age,  // Âge du personnage
                $_POST['armed'],  // Arme équipée par le personnage
                $size,  // Taille du personnage
                $date_o_birth,  // Date de naissance du personnage
                $_POST['place_of_birth'],  // Lieu de naissance du personnage
                $imageName,  // Nom de l'image
                $path,  // Chemin de l'image
                $characterId  // ID du personnage pour mettre à jour la bonne ligne
            ]);

            // Valide la transaction si tout est correct
            $this->db->commit();  
            echo "Le personnage a été mis à jour avec succès.";  // Message de succès
        } catch (Exception $e) {
            // Si une exception se produit, annule la transaction
            $this->db->rollBack();  
            // Lancer l'exception pour pouvoir la traiter plus loin
            throw $e;  
        }
    }
}
