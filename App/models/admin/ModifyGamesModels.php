<?php

namespace AdminModels;

use App\Database;
use Exception;

class ModifyGamesModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function modifyGamesModels($id) {
        $sqlModifyGames = "SELECT * FROM games WHERE id = ?";
        $modifyGames = $this->db->prepare($sqlModifyGames);
        $modifyGames->execute([$id]);
        return $modifyGames->fetch();
    }

    public function updateModels() {
        try {
            $this->db->beginTransaction();

            $currentGame = $this->modifyGamesModels($_POST['id_game']);

            $sqlUpdate = "UPDATE games SET 
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
            WHERE id = ?";

            $update = $this->db->prepare($sqlUpdate);

            $images_article = $_FILES["images_path"];
            $path = "assets/images/";
            $imageName = $currentGame['images_article'];

            if (isset($images_article) && $images_article['error'] === UPLOAD_ERR_OK) {
                $imageTmpPath = $images_article['tmp_name'];
                $imageName = basename($images_article['name']);
                $imagePath = $path . $imageName;

                if (!move_uploaded_file($imageTmpPath, $imagePath)) {
                    throw new Exception("Échec du téléchargement de l'image.");
                }
            }

            $update->execute([
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
                $imageName, 
                $path,
                $_POST['id_game']
            ]);

            $this->db->commit();
            echo "Le jeu a été mis à jour avec succès.";
        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}
?>