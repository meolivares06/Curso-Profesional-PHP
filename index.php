<?php
/**
 * Controlador frontal.
 * Se encarga redirigir las peticiones al controlador necesario.
 * 
 * Cuando no hay controlador solicitado se envia al default.
 */

 if (!isset($_REQUEST["controller"])) {
     require_once 'controller/animal_controller.php';
     $animalController = new AnimalController();
     $animalController->indexAnimal();
 }else {
    $controller = $_REQUEST["controller"];
    $action = $_REQUEST["action"];
    require_once "controller/".$controller."_controller.php";
    $controller = ucwords($controller).'Controller';
    $controller = new $controller;
    call_user_func(array($controller, $action));
 }
?>