<?php
namespace Models;

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
        $stmt = $this->db->prepare('SELECT id, titles_article FROM games');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                            );
                            ";

            $stmtCharacter = $this->db->prepare($sqlCharacter);
            $stmtCharacter->bindParam(':games_id', $games_id);
            $stmtCharacter->bindParam(':names_character', $names_character);
            $stmtCharacter->bindParam(':descriptions_character', $descriptions_character);
            $stmtCharacter->bindParam(':jobs_character', $jobs_character);
            $stmtCharacter->bindParam(':limits_break_character', $limits_break_character);
            $stmtCharacter->bindParam(':age_character', $age_character);
            $stmtCharacter->bindParam(':armed_character', $armed_character);
            $stmtCharacter->bindParam(':size_character', $size_character);
            $stmtCharacter->bindParam(':date_o_birth_character', $date_o_birth_character);
            $stmtCharacter->bindParam(':place_of_birth_character', $place_of_birth_character);
            $stmtCharacter->bindParam(':images_character', $img);
            $stmtCharacter->bindParam(':path', $path);
            $stmtCharacter->execute();

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


  