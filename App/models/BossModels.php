<?php

namespace Models;

use App\Database; 

class BossModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    public function listBoss($id) {
        $sqlBoss = "SELECT 
                g.titles_article,
                b.id,
                b.games_id,
                b.name_boss,
                b.descriptions_boss,
                b.HP_boss,
                b.MP_boss,
                b.loots_boss,
                b.weakness_boss,
                b.location_boss,
                b.gils_boss,
                b.experiences_boss,
                b.images_boss,
                b.path
            FROM 
                games g
            JOIN 
                boss b ON g.id = b.games_id
            WHERE 
                g.id = :id";    

            $boss = $this->db->prepare($sqlBoss);
            $boss->bindParam(':id', $id, \PDO::PARAM_INT); 
            $boss->execute(); 
            return $boss->fetchAll(\PDO::FETCH_ASSOC);
    }
}