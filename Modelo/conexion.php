<?php
class DB {
    private static $instancia = null;
    private $pdo;

    private function __construct() {
        $this->pdo = new PDO(
            "mysql:host=localhost;dbname=productosdb;charset=utf8mb4",
            "root", "",
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
             PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
        );
    }

    public static function getInstancia() {
        if (self::$instancia === null) self::$instancia = new DB();
        return self::$instancia;
    }

    public function insertSeguro($sql, $params) {
        $st = $this->pdo->prepare($sql);
        $st->execute($params);
        return $this->pdo->lastInsertId();
    }

    public function updateSeguro($sql, $params) {
        $st = $this->pdo->prepare($sql);
        $st->execute($params);
        return $st->rowCount();
    }

    public function query($sql, $params = []) {
        $st = $this->pdo->prepare($sql);
        $st->execute($params);
        return $st->fetchAll();
    }
}
