<?php

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use PDO;

class Pokemon extends CoreModel
{
    /**
     * Properties storing Pokemon information
     */
    private $hp;
    private $attack;
    private $defense;
    private $spe_attack;
    private $spe_defense;
    private $speed;
    private $number;

    /**
     * Creation of getters (no need for setters for our use case!)
     * to retrieve the values of the properties
     */

    public function getHp()
    {
        return $this->hp;
    }

    public function getAttack()
    {
        return $this->attack;
    }

    public function getDefense()
    {
        return $this->defense;
    }

    public function getSpeAttack()
    {
        return $this->spe_attack;
    }

    public function getSpeDefense()
    {
        return $this->spe_defense;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Method to retrieve the list of Pokemon ordered by numbers
     */
    public function findAll()
    {
        $sql = "SELECT *
                FROM `pokemon` 
                ORDER BY `number`";

        // Retrieve the connection to the database
        $pdo = Database::getPDO();

        // Execute the query
        $request = $pdo->query($sql);

        // Fetch all results with "fetchAll" and pass the retrieved data to an instance of the current model (Pokemon)
        $pokemons = $request->fetchAll(PDO::FETCH_CLASS, self::class);

        return $pokemons;
    }

    /**
     * Method to retrieve the information of a Pokemon
     */
    public function find($number)
    {
        $sql = "SELECT *
                FROM `pokemon` 
                WHERE `number` = {$number}
                LIMIT 1";

        // Retrieve the connection to the database
        $pdo = Database::getPDO();

        // Execute the query with query as we want to access
        // the data returned by the query
        $pdoStatement = $pdo->query($sql);

        // Fetch the result and instantiate the current class with the retrieved information
        $pokemon = $pdoStatement->fetchObject(self::class);

        return $pokemon;
    }

    /**
     * Method to retrieve a list of Pokemon by type
     */
    public function findByType($typeId)
    {
        // Join the pivot table "pokemon_type" to filter on type IDs
        $sql = "SELECT *
                FROM `pokemon` 
                INNER JOIN `pokemon_type` ON `pokemon_type`.`pokemon_number` = `pokemon`.`number`
                WHERE `pokemon_type`.`type_id` = {$typeId}
                ORDER BY `pokemon`.`number`";

        // Retrieve the connection to the database
        $pdo = Database::getPDO();

        // Execute the query with query as we want to access
        // the data returned by the query
        $pdoStatement = $pdo->query($sql);

        // Fetch all results with "fetchAll" and pass the retrieved data to an instance of the current model (Pokemon)
        $pokemons = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $pokemons;
    }

    /**
     * Method to retrieve the types of the current Pokemon
     */
    public function getTypes()
    {
        // Search in the pivot table "pokemon_type" for entries that match the provided number
        // then join this table with the "type" table and retrieve the fields
        $sql = "SELECT `type`.*
                FROM `pokemon_type`
                INNER JOIN `type` ON `type`.`id` = `pokemon_type`.`type_id`
                WHERE `pokemon_type`.`pokemon_number` = {$this->getNumber()}";

        // Retrieve the connection to the database
        $pdo = Database::getPDO();

        // Execute the query with query as we want to access
        // the data returned by the query
        $pdoStatement = $pdo->query($sql);

        // Fetch the result and instantiate the Type class with the retrieved information
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Type::class);

        return $types;
    }
}
