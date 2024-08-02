<?php
namespace Models;

use App\Database;

class DeleteBossModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function listDelete($game_id) {
        $sqlBossDelete = "SELECT * FROM boss WHERE games_id = ?";
        $BossDelete = $this->db->prepare($sqlBossDelete);
        $BossDelete->execute([$game_id]);
        return $BossDelete->fetchAll();
    }

    public function deleteBoss($bossId) {
        try {
            $sqlDeleteChildren = "DELETE FROM boss WHERE id = :id";
            $deleteChildren = $this->db->prepare($sqlDeleteChildren);
            $deleteChildren->bindParam(':id', $bossId, \PDO::PARAM_INT);
            return $deleteChildren->execute();

        } catch (\PDOException $e) {
            
            echo 'Erreur lors de la suppression : ' . $e->getMessage();
            return false;
        }
    }
}
