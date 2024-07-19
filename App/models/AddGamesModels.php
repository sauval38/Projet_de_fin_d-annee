<?php
namespace Models;

use Exception;
use App\Database;

class AddGamesModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    public function addGameWithImage($titles_article, $descriptions_article, $story_article, $platforms_article, $modes_article, $genres_article, $designers_article, $developers_article, $editors_article, $gameplay_article, $informations_article, $dates_release, $images_article, $path) {
        try {
            $path = 'assets/images/';
            
            $this->db->beginTransaction();
            $img = $images_article['name'];
            $storyArticleWithLineBreaks = nl2br($story_article);
            
            $sqlAddGames = "INSERT INTO games (titles_article, descriptions_article, story_article, platforms_article, modes_article, genres_article, designers_article, developers_article, editors_article, gameplay_article, informations_article, dates_release, images_article, path) VALUES (:titles_article, :descriptions_article, :story_article, :platforms_article, :modes_article, :genres_article, :designers_article, :developers_article, :editors_article, :gameplay_article, :informations_article, :dates_release, :images_article, :path)";
            
            $addGames = $this->db->prepare($sqlAddGames);
            $addGames->bindParam(':titles_article', $titles_article);
            $addGames->bindParam(':descriptions_article', $descriptions_article);
            $addGames->bindParam(':story_article', $storyArticleWithLineBreaks);
            $addGames->bindParam(':platforms_article', $platforms_article);
            $addGames->bindParam(':modes_article', $modes_article);
            $addGames->bindParam(':genres_article', $genres_article);
            $addGames->bindParam(':designers_article', $designers_article);
            $addGames->bindParam(':developers_article', $developers_article);
            $addGames->bindParam(':editors_article', $editors_article);
            $addGames->bindParam(':gameplay_article', $gameplay_article);
            $addGames->bindParam(':informations_article', $informations_article);
            $addGames->bindParam(':dates_release', $dates_release);
            $addGames->bindParam(':images_article', $img);
            $addGames->bindParam(':path', $path);
            $addGames->execute();

            
            if (isset($images_article) && $images_article['error'] === UPLOAD_ERR_OK) {
                $imageTmpPath = $images_article['tmp_name'];
                $imageName = basename($images_article['name']);
                $uploadDir = 'assets/images/';
                $imagePath = $uploadDir . $imageName;
                
                
                if (move_uploaded_file($imageTmpPath, $imagePath)) {
                    echo "Le jeu a été ajouté avec succès.";
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

