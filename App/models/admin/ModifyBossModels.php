<?php

namespace AdminModels;

use Exception;  // Importation de la classe Exception pour gérer les erreurs
use App\Database;  // Importation de la classe Database pour la gestion de la connexion à la base de données

class ModifyBossModels {
    protected $db;  // Déclaration de la propriété pour stocker la connexion à la base de données

    // Le constructeur crée une instance de la classe Database et récupère la connexion à la base de données
    public function __construct() {
        $database = new database();  // Création d'une instance de la classe Database
        $this->db = $database->getConnection();  // Récupère la connexion et l'affecte à la propriété $db
    }

    // Méthode pour récupérer les informations d'un boss spécifique par son ID
    public function modify($bossId) {
        // Requête SQL pour sélectionner le boss avec un identifiant spécifique
        $sqlModifyBoss = "SELECT * FROM boss WHERE id = ?";  
        
        // Préparation de la requête pour éviter les injections SQL
        $modifyBoss = $this->db->prepare($sqlModifyBoss);  
        
        // Exécution de la requête avec le paramètre d'identifiant du boss
        $modifyBoss->execute([$bossId]);  
        
        // Retourne la première ligne de résultats sous forme de tableau associatif
        return $modifyBoss->fetch();  
    }
     
    // Méthode pour mettre à jour un boss dans la base de données
    public function update() {
        try {
            // Démarre une transaction pour garantir que toutes les requêtes sont exécutées avec succès
            $this->db->beginTransaction();  

            // Récupération de l'ID du boss depuis les données POST
            $bossId = $_POST['id_boss'] ?? null;  
            if (!$bossId) {
                // Si l'ID du boss n'est pas fourni, une exception est lancée
                throw new Exception("L'ID du boss n'est pas fourni.");
            }

            // Récupère les informations actuelles du boss
            $currentBoss = $this->modify($bossId);  

            // Requête SQL pour mettre à jour les informations du boss dans la base de données
            $sqlBoss = "UPDATE boss SET 
                name_boss = ?,
                descriptions_boss = ?,
                HP_boss = ?,
                MP_boss = ?,
                loots_boss = ?,
                weakness_boss = ?,
                location_boss = ?,
                gils_boss = ?,
                experiences_boss = ?,
                images_boss = ?,
                path = ? 
            WHERE id = ?";  

            // Préparation de la requête d'update
            $update = $this->db->prepare($sqlBoss);  

            // Récupère le fichier image envoyé pour le boss, si présent
            $images_boss = $_FILES["images_path"] ?? null;  
            $path = "assets/images/";  // Le répertoire où l'image sera stockée
            $imageName = $currentBoss['images_boss'] ?? '';  // Récupère le nom actuel de l'image, si elle existe

            // Si une nouvelle image est téléchargée
            if ($images_boss && $images_boss['error'] === UPLOAD_ERR_OK) {
                $imageTmpPath = $images_boss['tmp_name'];  // Chemin temporaire du fichier téléchargé
                $imageName = basename($images_boss['name']);  // Extraire le nom du fichier de l'image
                $imagePath = $path . $imageName;  // Créer le chemin complet de l'image

                // Déplace l'image téléchargée vers le répertoire spécifié
                if (!move_uploaded_file($imageTmpPath, $imagePath)) {
                    // Si le déplacement échoue, une exception est lancée
                    throw new Exception("Échec du téléchargement de l'image.");
                }
            }

            // Vérifie si les valeurs HP, MP, gils et experiences sont des nombres
            $HP = isset($_POST['HP']) && is_numeric($_POST['HP']) ? (int) $_POST['HP'] : null;
            $MP = isset($_POST['MP']) && is_numeric($_POST['MP']) ? (int) $_POST['MP'] : null;
            $gils = isset($_POST['gils']) && is_numeric($_POST['gils']) ? (int) $_POST['gils'] : null;
            $experiences = isset($_POST['experiences']) && is_numeric($_POST['experiences']) ? (int) $_POST['experiences'] : null;

            // Exécute la mise à jour des informations du boss avec les nouvelles données
            $update->execute([
                $_POST['name'],  // Nom du boss
                $_POST['descriptions'],  // Description du boss
                $HP,  // Points de vie
                $MP,  // Points de magie
                $_POST['loots'],  // Loots associés
                $_POST['weakness'],  // Faiblesses du boss
                $_POST['location'],  // Lieu du boss
                $gils,  // Montant en gils
                $experiences,  // Expérience gagnée
                $imageName,  // Nom de l'image
                $path,  // Chemin de l'image
                $bossId  // ID du boss pour mettre à jour la bonne ligne
            ]);

            // Valide la transaction si tout est correct
            $this->db->commit();  
            echo "Le boss a été mis à jour avec succès.";  // Message de succès
        } catch (Exception $e) {
            // Si une exception se produit, annule la transaction
            $this->db->rollBack();  
            // Lancer l'exception pour pouvoir la traiter plus loin
            throw $e;  
        }
    }
}
