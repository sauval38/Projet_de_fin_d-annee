<?php
namespace Models;

use App\Database;

class ListDeleteGamesModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function listeDelete() {
        $sqlListDelete = "SELECT * FROM games";
        $listDelete = $this->db->prepare($sqlListDelete);
        $listDelete->execute();
        return $listDelete->fetchAll();
    }

    public function deleteGame($gameId) {
        try {
            $sqlDeleteChildren = "DELETE FROM `character` WHERE games_id = :id";
            $deleteChildren = $this->db->prepare($sqlDeleteChildren);
            $deleteChildren->bindParam(':id', $gameId, \PDO::PARAM_INT);
            $deleteChildren->execute();
     
            $sqlDelete = "DELETE FROM games WHERE id = :id";
            $delete = $this->db->prepare($sqlDelete);
            $delete->bindParam(':id', $gameId, \PDO::PARAM_INT);
            return $delete->execute();
        } catch (\PDOException $e) {
            
            echo 'Erreur lors de la suppression : ' . $e->getMessage();
            return false;
        }
    }
}
