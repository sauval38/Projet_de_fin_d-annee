<?php

namespace Models;

use Exception;
use App\Database;

class ModifyCharacterModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    } 

    public function modify($characterId) {
        $sqlModifyCharacter = "SELECT * FROM `character` WHERE id = ?";
        $modifyCharacter = $this->db->prepare($sqlModifyCharacter);
        $modifyCharacter->execute([$characterId]);
        return $modifyCharacter->fetch();
    }

    public function update() {
        try {
            $this->db->beginTransaction();
    
            $characterId = $_POST['id_character'] ?? null;
            if (!$characterId) {
                throw new Exception("L'ID du personnage n'est pas fourni.");
            }
    
            $currentGame = $this->modify($characterId);
    
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
    
            $update = $this->db->prepare($sqlUpdate);
    
            $images_article = $_FILES["images_path"] ?? null;
            $path = "assets/images/";
            $imageName = $currentGame['images_character'] ?? '';
    
            if ($images_article && $images_article['error'] === UPLOAD_ERR_OK) {
                $imageTmpPath = $images_article['tmp_name'];
                $imageName = basename($images_article['name']);
                $imagePath = $path . $imageName;
    
                if (!move_uploaded_file($imageTmpPath, $imagePath)) {
                    throw new Exception("Échec du téléchargement de l'image.");
                }
            }
    
            $date_o_birth = !empty($_POST['date_o_birth']) ? $_POST['date_o_birth'] : null;
            if ($date_o_birth) {
                $date_o_birth = date('Y-m-d H:i:s', strtotime($date_o_birth));
            }
    
            $age = isset($_POST['age']) && is_numeric($_POST['age']) ? (int) $_POST['age'] : null;
    
            $size = isset($_POST['size']) && is_numeric($_POST['size']) ? $_POST['size'] : null;
    
            $update->execute([
                $_POST['names'],
                $_POST['descriptions'],
                $_POST['jobs'],
                $age, 
                $_POST['armed'],
                $size,
                $date_o_birth,
                $_POST['place_of_birth'],
                $imageName,
                $path,
                $characterId 
            ]);
    
            $this->db->commit();
            echo "Le personnage a été mis à jour avec succès.";
        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}