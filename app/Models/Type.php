<?php

    class Type extends CoreModel{

       //les propriétés: 
       
       private $color;

       // les actives records:

     public function findAll(){

       $sql = 'SELECT `id`, `name`, `color` FROM `type`';

       $pdo = Database::getPDO();

           $pdoStatement = $pdo->query($sql);

           $types = $pdoStatement ->fetchAll(PDO::FETCH_CLASS, 'Type');

           return $types;
       }

       public function find($id){
           $sql = 'SELECT * FROM `type` WHERE id = '.$id;
           $pdo = Database::getPDO();

           $pdoStatement = $pdo->query($sql);

           $type = $pdoStatement ->fetchObject('Type');

           return $type;

        }


       /**
        * Get the value of color
        */ 
       public function getColor()
       {
              return $this->color;
       }

       /**
        * Set the value of color
        *
        * @return  self
        */ 
       public function setColor($color)
       {
              $this->color = $color;

              return $this;
       }
    }