<?php
namespace App\src\DAO;
use PDO;
use Exception;

abstract class DAO 

{
    
    private $connection;
    private function checkConnection(){
        //verifie si la connection est nulle
        if($this->connection === null){
            return $this->getConnection();
        }
        return $this->connection;
    }
    //Méthode de connection à la base de données
    private function getConnection()
    {
        //tentative de connexion à la bas de données
        try{
            $this->connection = new PDO(DB_HOST,DB_USER,DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        }
        //On lève une erreur si la connexion échoue
        catch(Exception $errorConnection){
            die('Erreur de connection:'.$errorConnection->getMessage());
        }
    }
    
    protected function createQuery($sql, $parameters = null){
        try{
            if($parameters){
                $result = $this->checkConnection()->prepare($sql);
                $result->execute($parameters);
                return $result;
            }
            $result = $this->checkConnection()->query($sql);
            return $result;
        }
        catch(Exception $e){
            die('query error'.$e->getMessage());
        }
    }
}