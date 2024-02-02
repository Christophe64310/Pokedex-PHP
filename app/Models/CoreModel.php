<?php

namespace Pokedex\Models;

class CoreModel
{
    /** 
     * All our models have the common properties id and name. We can extract them into the parent model.
     */
    protected $id;
    protected $name;

    /**
     * Similarly for the getters (no need for setters in this project)
     */

    /**
     * Get the value of the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }
}
