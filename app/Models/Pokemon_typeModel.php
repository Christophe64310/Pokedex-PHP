<?php

    class Pokemon_typeModel {

        private $id;
        private $pokemon_number;
        private $type_id;

        // les actives records:

     public function findAll(){

        $sql = 'SELECT pokemon.name, type.name
        FROM pokemon
        JOIN pokemon_type ON pokemon.number = pokemon_type.pokemon_number
        JOIN type ON pokemon_type.type_id = type.id';

        $pdo = Database::getPDO();

            $pdoStatement = $pdo->query($sql);

            $pokemons_type = $pdoStatement ->fetchAll(PDO::FETCH_CLASS, 'Pokemon_typeModel');

            return $pokemons_type;
        }

        public function find($id){
            $sql = 'SELECT pokemon.name, type.name
        FROM pokemon
        JOIN pokemon_type ON pokemon.number = pokemon_type.pokemon_number
        JOIN type ON pokemon_type.type_id = '.$id;

        $pdo = Database::getPDO();

            $pdoStatement = $pdo->query($sql);

            $pokemon_type = $pdoStatement ->fetchAll(PDO::FETCH_CLASS, 'Pokemon_typeModel');

            return $pokemon_type;

         }
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of pokemon_number
         */ 
        public function getPokemon_number()
        {
                return $this->pokemon_number;
        }

        /**
         * Set the value of pokemon_number
         *
         * @return  self
         */ 
        public function setPokemon_number($pokemon_number)
        {
                $this->pokemon_number = $pokemon_number;

                return $this;
        }

        /**
         * Get the value of type_id
         */ 
        public function getType_id()
        {
                return $this->type_id;
        }

        /**
         * Set the value of type_id
         *
         * @return  self
         */ 
        public function setType_id($type_id)
        {
                $this->type_id = $type_id;

                return $this;
        }
    }