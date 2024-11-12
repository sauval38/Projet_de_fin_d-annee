<?php

namespace AdminModels; // Déclaration de l'espace de noms pour organiser le code.

use App\Database; // Importation de la classe Database pour gérer la connexion à la base de données.
use Exception; // Importation de la classe Exception pour gérer les exceptions.

class ModifyGamesModels { // Déclaration de la classe ModifyGamesModels, responsable de la modification des jeux.
    protected $db; // Propriété protégée pour stocker la connexion à la base de données.

    public function __construct() { // Constructeur de la classe, exécuté lors de la création d'une instance.
        $database = new Database(); // Création d'une nouvelle instance de la classe Database.
        $this->db = $database->getConnection(); // Récupération de la connexion à la base de données.
    }
    
    public function modifyGamesModels($id) { // Méthode pour récupérer les informations d'un jeu à modifier en fonction de son ID.
        $sqlModifyGames = "SELECT * FROM games WHERE id = ?"; // Préparation de la requête SQL pour sélectionner un jeu par son ID.
        $modifyGames = $this->db->prepare($sqlModifyGames); // Préparation de la requête.
        $modifyGames->execute([$id]); // Exécution de la requête avec l'ID du jeu.
        return $modifyGames->fetch(); // Retourne les données du jeu récupérées.
    }

    public function updateModels() { // Méthode pour mettre à jour les informations d'un jeu.
        try { // Début du bloc try pour gérer les exceptions.
            $this->db->beginTransaction(); // Démarre une transaction pour assurer l'intégrité des données.

            $currentGame = $this->modifyGamesModels($_POST['id_game']); // Récupération des données actuelles du jeu à partir de l'ID envoyé via POST.

            $sqlUpdate = "UPDATE games SET  // Préparation de la requête SQL pour mettre à jour les données d'un jeu.
                titles_article = ?, 
                descriptions_article = ?, 
                story_article = ?, 
                platforms_article = ?, 
                modes_article = ?, 
                genres_article = ?, 
                designers_article = ?, 
                developers_article = ?, 
                editors_article = ?, 
                informations_article = ?, 
                gameplay_article = ?,  
                dates_release = ?,
                images_article = ?, 
                path = ? 
            WHERE id = ?"; // Clause WHERE pour spécifier quel jeu mettre à jour.

            $update = $this->db->prepare($sqlUpdate); // Préparation de la requête de mise à jour.

            $images_article = $_FILES["images_path"]; // Récupération des informations sur le fichier image téléchargé.
            $path = "assets/images/"; // Définition du chemin où les images seront stockées.
            $imageName = $currentGame['images_article']; // Récupération du nom de l'image actuelle.

            if (isset($images_article) && $images_article['error'] === UPLOAD_ERR_OK) { // Vérification si un fichier a été téléchargé sans erreur.
                $imageTmpPath = $images_article['tmp_name']; // Récupération du chemin temporaire du fichier image.
                $imageName = basename($images_article['name']); // Récupération du nom de base du fichier image.
                $imagePath = $path . $imageName; // Création du chemin complet pour le fichier image.

                if (!move_uploaded_file($imageTmpPath, $imagePath)) { // Déplacement du fichier téléchargé vers le dossier cible.
                    throw new Exception("Échec du téléchargement de l'image."); // Lancer une exception si le téléchargement échoue.
                }
            }

            $update->execute([ // Exécution de la requête de mise à jour avec les nouvelles valeurs.
                $_POST['titles'],
                $_POST['descriptions'],
                $_POST['story'],
                $_POST['platforms'],
                $_POST['modes'],
                $_POST['genres'],
                $_POST['designers'],
                $_POST['developers'],
                $_POST['editors'],
                $_POST['informations'],
                $_POST['gameplay'],
                $_POST['dates'],
                $imageName, // Utilisation du nouveau nom d'image ou de l'image existante si aucune nouvelle image n'est téléchargée.
                $path,
                $_POST['id_game'] // ID du jeu à mettre à jour.
            ]);

            $this->db->commit(); // Validation de la transaction pour enregistrer les modifications dans la base de données.
            echo "Le jeu a été mis à jour avec succès."; // Affichage d'un message de succès.
        } catch (Exception $e) { // Bloc catch pour gérer les exceptions.
            $this->db->rollBack(); // Annulation de la transaction en cas d'erreur.
            throw $e; // Relancer l'exception pour être traitée ailleurs.
        }
    }
}
