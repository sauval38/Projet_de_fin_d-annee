<?php

namespace App;

use PDO;
use PDOException;

class Database {
    protected $cnx;
    protected $host = 'localhost';
    protected $db = 'final-fantasy';
    protected $login = 'root';
    protected $pw = 'root';

    public function __construct() {
        try {
            $this->cnx = new PDO("mysql:host=$this->host;dbname=$this->db;charset=utf8", $this->login, $this->pw);
            $this->cnx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->cnx->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log('Connection failed: ' . $e->getMessage());
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function getConnection() {
        return $this->cnx;
    }
}
?>