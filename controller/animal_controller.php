<?php
require_once "model/animal.php";

class AnimalController {
    private $model;

    public function __construct() {
        $this->model = new Animal();
    }

    /**
     * Vista por defecto de la aplicacion.
     */
    public function indexAnimal() {
        require_once 'view/animal.php';
    }

    public function showById() {
        $animal = new Animal();

        if(isset($_REQUEST["id"])) {
            $animal = $this->model->getById($_REQUEST["id"]);
        }

        require_once "view/animal_form.php";
    }

    public function save() {
        $animal = new Animal();
        $animal->id = $_REQUEST["id"];
        $animal->name = $_REQUEST["name"];
        $animal->species = $_REQUEST["species"];
        $animal->breed = $_REQUEST["breed"];
        $animal->gender = $_REQUEST["gender"];
        $animal->colour = $_REQUEST["colour"];
        $animal->age = $_REQUEST["age"];

        $animal->id > 0 ? $animal->update() : $animal->create();

        header("Location: index.php");
    }

    public function delete() {
        $this->model->delete($_REQUEST["id"]);

        header("Location: index.php");
    }
}

?>