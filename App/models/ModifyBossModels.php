<?php

namespace Models;

use Exception;
use App\Database;

class ModifyBossModels {
    protected $db;

    public function __construct() {
        $database = new database();
        $this->db = $database->getConnection();
    }

    public function modify($bossId) {
        $sqlModifyBoss = "SELECT * FROM boss WHERE id = ?";
        $modifyBoss = $this->db->prepare($sqlModifyBoss);
        $modifyBoss->execute([$bossId]);
        return $modifyBoss->fetch();
    }
     
    public function update() {
        try {
            $this->db->beginTransaction();

            $bossId = $_POST['id_boss'] ?? null;
            if (!$bossId) {
                throw new Exception("L'ID du boss n'est pas fourni.");
            }

            $currentBoss = $this->modify($bossId);

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

            $update = $this->db->prepare($sqlBoss);

            $images_boss = $_FILES["images_path"] ?? null;
            $path = "assets/images/";
            $imageName = $currentGame['images_character'] ?? '';

            if ($images_boss && $images_boss['error'] === UPLOAD_ERR_OK) {
                $imageTmpPath = $images_boss['tmp_name'];
                $imageName = basename($images_boss['name']);
                $imagePath = $path . $imageName;
    
                if (!move_uploaded_file($imageTmpPath, $imagePath)) {
                    throw new Exception("Échec du téléchargement de l'image.");
                }
            }

            $gils = isset($_POST['gils']) && is_numeric($_POST['gils']) ? (int) $_POST['gils'] : null;

            $experiences = isset($_POST['experiences']) && is_numeric($_POST['experiences']) ? (int) $_POST['experiences'] : null;

            $update->execute([
                $_POST['name'],
                $_POST['descriptions'],
                $_POST['HP'],
                $_POST['MP'],
                $_POST['loots'],
                $_POST['weakness'],
                $_POST['location'],
                $gils,
                $experiences,
                $imageName,
                $path,
                $bossId
            ]);

            $this->db->commit();
            echo "Le boss a été mis à jour avec succès.";
        } catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }
}