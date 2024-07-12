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
            
            $sqlArticle = "INSERT INTO games (titles_article, descriptions_article, story_article, platforms_article, modes_article, genres_article, designers_article, developers_article, editors_article, gameplay_article, informations_article, dates_release, images_article, path) VALUES (:titles_article, :descriptions_article, :story_article, :platforms_article, :modes_article, :genres_article, :designers_article, :developers_article, :editors_article, :gameplay_article, :informations_article, :dates_release, :images_article, :path)";
            
            $stmtArticle = $this->db->prepare($sqlArticle);
            $stmtArticle->bindParam(':titles_article', $titles_article);
            $stmtArticle->bindParam(':descriptions_article', $descriptions_article);
            $stmtArticle->bindParam(':story_article', $story_article);
            $stmtArticle->bindParam(':platforms_article', $platforms_article);
            $stmtArticle->bindParam(':modes_article', $modes_article);
            $stmtArticle->bindParam(':genres_article', $genres_article);
            $stmtArticle->bindParam(':designers_article', $designers_article);
            $stmtArticle->bindParam(':developers_article', $developers_article);
            $stmtArticle->bindParam(':editors_article', $editors_article);
            $stmtArticle->bindParam(':gameplay_article', $gameplay_article);
            $stmtArticle->bindParam(':informations_article', $informations_article);
            $stmtArticle->bindParam(':dates_release', $dates_release);
            $stmtArticle->bindParam(':images_article', $img);
            $stmtArticle->bindParam(':path', $path);
            $stmtArticle->execute();

            
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

