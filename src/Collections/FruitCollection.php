<?php

namespace App\Collections;


class FruitCollection  
extends AbstractFoodCollection implements IFoodCollection
{
    
    private $type = "fruit";

    public function add(mixed $element): void
    {
        if (is_object($element)) {
            $element = (array) $element ;
        }
            
        if ( ! empty($element["type"]) && $element["type"] == $this->type) {
            $this->elements[] = $this->convertToGrams($element);
        }
    }

}