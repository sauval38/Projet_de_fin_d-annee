<?php

namespace Models;

use App\Database; 

class CharacterModels {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function listCharacter($id) {
        $sqlCharacter = "SELECT 
                            g.titles_article,
                            c.names_character,
                            c.descriptions_character,
                            c.jobs_character,
                            c.limits_break_character,
                            c.age_character,
                            c.armed_character,
                            c.size_character,
                            c.date_o_birth_character,
                            c.place_of_birth_character,
                            c.path,
                            c.images_character
                        FROM 
                            `character` c
                        JOIN 
                            `games` g 
                        ON 
                            c.games_id = g.id
                        WHERE 
                            g.id = ?";
                           
                            
        $query = $this->db->getConnection()->prepare($sqlCharacter);
        $query->execute([$id]);
        return  $query->fetchAll(); 

    }
}
?>