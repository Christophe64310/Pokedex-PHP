<?php

    class Type extends CoreModel{

       //les propriétés: 
       
       private $color;

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