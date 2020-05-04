<?php
require_once 'connection.php';

/**
 * Representa una conexion sobre una tabla.
 * Representa todas las operaciones sobre una tabla
 */
abstract class CRUD extends Connection {
    private $table;
    private $pdo;

    public function __construct($table){
        $this->table = $table;
        $this->pdo= parent::connection();
    }

    public function getAll() {
        try{
            $stm = $this->pdo->prepare("SELECT * FROM $this->table");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function getById($id) {
        try{
            $stm = $this->pdo->prepare("SELECT * FROM $this->table WHERE id=?");
            $stm->execute(array($id));
            return $stm->fetch(PDO::FETCH_OBJ);
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($id) {
        try{
            $stm = $this->pdo->prepare("DELETE FROM $this->table WHERE id=?");
            $stm->execute(array($id));
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    abstract function create();
    abstract function update();
    abstract function delete2();
}