<?php
namespace Models;

use App\Database;
use Exception;

class AddGamesModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function addGameWithImage($title_article, $description_article, $contents_article, $platforms_article, $mode_article, $genres_article, $designers_article, $developers_article, $editors_article, $date_release, $image_article, $path) {
        try {
            $path = 'assets/images/';
            
            $this->db->beginTransaction();
            $img = $image_article['name'];
            
            $sqlArticle = "INSERT INTO games (title_article, description_article, contents_article, platforms_article, mode_article, genres_article, designers_article, developers_article, editors_article, date_release, image_article, path) VALUES (:title_article, :description_article, :contents_article, :platforms_article, :mode_article, :genres_article, :designers_article, :developers_article, :editors_article, :date_release, :image_article, :path)";
            
            $stmtArticle = $this->db->prepare($sqlArticle);
            $stmtArticle->bindParam(':title_article', $title_article);
            $stmtArticle->bindParam(':description_article', $description_article);
            $stmtArticle->bindParam(':contents_article', $contents_article);
            $stmtArticle->bindParam(':platforms_article', $platforms_article);
            $stmtArticle->bindParam(':mode_article', $mode_article);
            $stmtArticle->bindParam(':genres_article', $genres_article);
            $stmtArticle->bindParam(':designers_article', $designers_article);
            $stmtArticle->bindParam(':developers_article', $developers_article);
            $stmtArticle->bindParam(':editors_article', $editors_article);
            $stmtArticle->bindParam(':date_release', $date_release);
            $stmtArticle->bindParam(':image_article', $img);
            $stmtArticle->bindParam(':path', $path);
            $stmtArticle->execute();

            
            if (isset($image_article) && $image_article['error'] === UPLOAD_ERR_OK) {
                $imageTmpPath = $image_article['tmp_name'];
                $imageName = basename($image_article['name']);
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

