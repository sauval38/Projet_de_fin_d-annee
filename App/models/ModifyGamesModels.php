<?php
namespace Models;

use App\Database;

class ModifyGamesModels {
    protected $db;

    public function __construct() {
        $this->db = new Database();
        }
        
        public function modify($id) {
            $sqlArticle = "SELECT * FROM games WHERE id = ?";
            $query = $this->db->getConnection()->prepare($sqlArticle);
            $query->execute([$id]);
            return $query->fetch();  
        }

        public function update($id, $data) {
            $sqlUpdate = "UPDATE games SET 
                            title_article = ?, 
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
                            dates_article = ?, 
                            images_path = ?
                        WHERE id = ?";

            $query = $this->db->getConnection()->prepare($sqlUpdate);

            $query->execute([
                $data['title_article'],
                $data['descriptions_article'],
                $data['story_article'],
                $data['platforms_article'],
                $data['modes_article'],
                $data['genres_article'],
                $data['designers_article'],
                $data['developers_article'],
                $data['editors_article'],
                $data['informations_article'],
                $data['gameplay_article'],
                $data['dates_article'],
                $data['images_path'],
                $id
            ]);
            return $query->rowCount(); 
        }
}
    
