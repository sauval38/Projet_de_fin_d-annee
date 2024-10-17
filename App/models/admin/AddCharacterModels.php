<?php

namespace AdminModels;

use PDO;
use Exception;
use App\Database;

class AddCharacterModels {
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

    public function addCharacterWithImage($games_id, $names_character, $descriptions_character, $jobs_character, $limits_break_character, $age_character, $armed_character, $size_character, $date_o_birth_character, $place_of_birth_character, $images_character, $path) {
        try {
            $path = 'assets/images/';

            $this->db->beginTransaction();

            $img = $images_character['name'];

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

            $size_character = !empty($size_character) ? floatval($size_character) : null;
            $age_character = !empty($age_character) ? intval($age_character) : null;
            $date_o_birth_character = !empty($date_o_birth_character) ? $date_o_birth_character : null;                

            $character = $this->db->prepare($sqlCharacter);
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
            $character->execute();

            if (isset($images_character) && $images_character['error'] === UPLOAD_ERR_OK) {
                $imageTmpPath = $images_character['tmp_name'];
                $imageName = basename($images_character['name']);
                $uploadDir = 'assets/images/';
                $imagePath = $uploadDir . $imageName;

                if (move_uploaded_file($imageTmpPath, $imagePath)) {
                    echo "Le personnage a été ajouté avec succès.";
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


  