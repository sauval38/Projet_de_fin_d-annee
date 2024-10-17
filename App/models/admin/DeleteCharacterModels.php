<?php

namespace AdminModels;

use App\Database;

class DeleteCharacterModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function listDelete($game_id) {
        $sqlCharacterDelete = "SELECT * FROM `character` WHERE games_id = ?";
        $CharacterDelete = $this->db->prepare($sqlCharacterDelete);
        $CharacterDelete->execute([$game_id]);
        return $CharacterDelete->fetchAll();
    }

    public function deleteCharacter($characterId) {
        try {
            $sqlDeleteChildren = "DELETE FROM `character` WHERE id = :id";
            $deleteChildren = $this->db->prepare($sqlDeleteChildren);
            $deleteChildren->bindParam(':id', $characterId, \PDO::PARAM_INT);
            return $deleteChildren->execute();

        } catch (\PDOException $e) {
            
            echo 'Erreur lors de la suppression : ' . $e->getMessage();
            return false;
        }
    }
}
