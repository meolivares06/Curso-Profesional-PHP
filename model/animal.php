<?php
require_once 'core/crud.php';
class Animal extends CRUD {
    private $id;
    private $name;
    private $species;
    private $breed;
    private $gender;
    private $colour;
    private $age;
    const TABLE='animal';
    private $pdo;

    public function __construct(){
        parent::__construct(self::TABLE);
        $this->pdo= parent::connection();
    }

    public function __set($name, $value) {
        $this->$name=$value;
    }
    public function __get($name) {
        return $this->$name;
    }

    public function create(){
        try {
            $stm=$this->pdo->prepare("INSERT INTO ".self::TABLE." (name, species, breed, gender, colour, age) VALUES (?, ?, ?, ?, ?, ?)");
            $stm->execute(array($this->name,$this->species,$this->breed,$this->gender,$this->colour, $this->age));
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function update(){
        try{
            $stm=$this->pdo->prepare("UPDATE ".self::TABLE." SET name=?, species=?, breed=?, gender=?, colour=?, age=? WHERE id=?");
            $stm->execute(array(
                $this->name,
                $this->species,
                $this->breed,
                $this->gender,
                $this->colour,
                $this->age,
                $this->id));
        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete2() {
        try{
            $stm = $this->pdo->prepare("DELETE FROM ".self::TABLE." WHERE id=?");
            $stm->execute(array($this->id));
        }catch(PDOException $e) {
            echo '<pre>'.$e->getMessage().'</pre>';
        }
    }

}