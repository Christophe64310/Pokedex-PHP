<?php

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use PDO;

class Type extends CoreModel
{

    /** 
     * Properties storing type information
     */
    private $color;

    /**
     * Creation of getters (no need for setters for our use case!)
     * to retrieve the values of the properties
     */

    public function getColor()
    {
        return $this->color;
    }

    /** 
     * Method to retrieve the list of types
     */
    public function findAll()
    {
        $sql = "SELECT *
                FROM `type` 
                ORDER BY `name`";

        // Retrieve the connection to the database
        $pdo = Database::getPDO();

        // Execute the query
        $pdoStatement = $pdo->query($sql);

        // Fetch all results with "fetchAll" and pass the retrieved data to an instance of the current model (Type)
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $types;
    }
}
