<?php

namespace AdminModels;

use PDO;
use Exception;
use App\Database;

class AddBossModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    public function getTitles() {
        $sqlTitles = $this->db->prepare('SELECT id, titles_article FROM games');
        $sqlTitles->execute();
        return $sqlTitles->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addBossWithImage($games_id, $name_boss, $descriptions_boss, $HP_boss, $MP_boss, $loots_boss, $weakness_boss, $location_boss, $gils_boss, $experiences_boss, $images_boss, $path) {
        try {
        $path = 'assets/images/';

        $this->db->beginTransaction();

        $img = $images_boss['name'];

        $MP_boss = !empty($MP_boss) ? $MP_boss : NULL;
        $HP_boss = !empty($HP_boss) ? $HP_boss : NULL;
        $gils_boss = !empty($gils_boss) ? $gils_boss : NULL;
        $experiences_boss = !empty($experiences_boss) ? $experiences_boss : NULL;

        $sqlBoss = "INSERT INTO boss (games_id, name_boss, descriptions_boss, HP_boss, MP_boss, loots_boss, weakness_boss, location_boss, gils_boss, experiences_boss,images_boss, path) VALUES (:games_id, :name_boss, :descriptions_boss, :HP_boss, :MP_boss, :loots_boss, :weakness_boss, :location_boss, :gils_boss, :experiences_boss, :images_boss, :path)";

        $boss = $this->db->prepare($sqlBoss);
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
        $boss->execute();

        if (isset($images_boss) && $images_boss['error'] === UPLOAD_ERR_OK) {
            $imageTmpPath = $images_boss['tmp_name'];
            $imageName = basename($images_boss['name']);
            $uploadDir = 'assets/images/';
            $imagePath = $uploadDir . $imageName;

            if (move_uploaded_file($imageTmpPath, $imagePath)) {
                echo "Le boss a été ajouté avec succès.";
            } 
        }
        $this->db->commit();
        } 
        catch (Exception $e) {
            $this->db->rollBack();
            throw $e;
        }
    }  
}      
    

