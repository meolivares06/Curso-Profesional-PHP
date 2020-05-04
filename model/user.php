<?php
require_once 'core/crud.php';

class User extends CRUD {
    private $id;
    private $name;
    private $lastname;
    private $gender;
    private $address;
    private $phonenumber;
    private $age;
    const TABLE = 'user';
    private $pdo;

    public function __construct() {
        parent::__construct(self::TABLE);
        $this->pdo = parent::connection();
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function create() {
        try{
            $stm = $this->pdo->prepare("INSERT INTO ".self::TABLE." (name, lastname, gender, address, phonenumber, age) VALUES (?, ?, ?, ?, ?, ?)");
            $stm->execute(array($this->name,$this->lastname,$this->gender,$this->address,$this->phonenumber,$this->age));
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function update() {
        try{
            $stm = $this->pdo->prepare("UPDATE ".self::TABLE." SET name=?, lastname=?, gender=?, address=?, phonenumber=?, age=? WHERE id=?");
            $stm->execute(array($this->name,$this->lastname,$this->gender,$this->address,$this->phonenumber,$this->age, $this->id));
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete2() {
        try{
            $stm = $this->pdo->prepare("DELETE FROM ".self::TABLE." WHERE id=?");
            $stm->execute(array($this->id));
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
}
