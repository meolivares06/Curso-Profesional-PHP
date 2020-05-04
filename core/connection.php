<?php
class Connection 
{
    private $driver='mysql';
    private $host='localhost';
    private $user='root';
    private $password='';
    private $dbName='curso_php';
    private $charset='utf8';

    protected function connection() {
        try{
            //mysql:host=localhost;dbname=curso_php;charset=utf8
            $pdo = new PDO("{$this->driver}:host={$this->host};dbname={$this->dbName};charset={$this->charset}", $this->user, $this->password);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $pdo;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

}