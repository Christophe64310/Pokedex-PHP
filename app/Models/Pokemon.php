<?php

    class Pokemon extends CoreModel{

     //les propriétés:
     
     private $hp;
     private $attack;
     private $defense;
     private $spe_attack;
     private $spe_defense;
     private $speed;
     private $number; 
     
     // les actives records:

     public function findAll(){

        $sql = 'SELECT `id`, `name`, `hp`, `attack`, `defense`, `spe_attack`, `spe_defense`, `speed`, `number` FROM `pokemon`';

        $pdo = Database::getPDO();

            $pdoStatement = $pdo->query($sql);

            $pokemons = $pdoStatement ->fetchAll(PDO::FETCH_CLASS, 'Pokemon');

            return $pokemons;
        }

        public function find($id){
            $sql = 'SELECT * FROM pokemon WHERE id = '.$id;
            $pdo = Database::getPDO();

            $pdoStatement = $pdo->query($sql);

            $pokemon = $pdoStatement ->fetchObject('Pokemon');

            return $pokemon;

         }

     /**
      * Get the value of id
      */ 
     

     /**
      * Get the value of hp
      */ 
     public function getHp()
     {
          return $this->hp;
     }

     /**
      * Set the value of hp
      *
      * @return  self
      */ 
     public function setHp($hp)
     {
          $this->hp = $hp;

          return $this;
     }

     /**
      * Get the value of attack
      */ 
     public function getAttack()
     {
          return $this->attack;
     }

     /**
      * Set the value of attack
      *
      * @return  self
      */ 
     public function setAttack($attack)
     {
          $this->attack = $attack;

          return $this;
     }

     /**
      * Get the value of defense
      */ 
     public function getDefense()
     {
          return $this->defense;
     }

     /**
      * Set the value of defense
      *
      * @return  self
      */ 
     public function setDefense($defense)
     {
          $this->defense = $defense;

          return $this;
     }

     /**
      * Get the value of spe_attack
      */ 
     public function getSpe_attack()
     {
          return $this->spe_attack;
     }

     /**
      * Set the value of spe_attack
      *
      * @return  self
      */ 
     public function setSpe_attack($spe_attack)
     {
          $this->spe_attack = $spe_attack;

          return $this;
     }

     /**
      * Get the value of spe_defense
      */ 
     public function getSpe_defense()
     {
          return $this->spe_defense;
     }

     /**
      * Set the value of spe_defense
      *
      * @return  self
      */ 
     public function setSpe_defense($spe_defense)
     {
          $this->spe_defense = $spe_defense;

          return $this;
     }

     /**
      * Get the value of speed
      */ 
     public function getSpeed()
     {
          return $this->speed;
     }

     /**
      * Set the value of speed
      *
      * @return  self
      */ 
     public function setSpeed($speed)
     {
          $this->speed = $speed;

          return $this;
     }

     /**
      * Get the value of number
      */ 
     public function getNumber()
     {
          return $this->number;
     }

     /**
      * Set the value of number
      *
      * @return  self
      */ 
     public function setNumber($number)
     {
          $this->number = $number;

          return $this;
     }
    }