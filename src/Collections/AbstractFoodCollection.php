<?php

namespace App\Collections;

use Doctrine\Common\Collections\ArrayCollection;

abstract class AbstractFoodCollection extends ArrayCollection
{
  
   private $type = "food";

    public function add(mixed $element): void
    {
        if (is_object($element)) {
            $element = (array) $element ;
        }
            
        if ( ! empty($element["type"]) && $element["type"] == $this->type) {
            $this->elements[] = $this->convertToGrams($element);
        }
    }

    /**
     * remove elements by key or by object
     */  
    public function remove(mixed $param): array|bool
    {

        if (is_int($param)) {
         return   parent::remove($param);
        };

        if(is_object($param)) {
            $asArray = (array) $param ;
           return parent::removeElement($asArray);
        }
    }

    /**
     * list some element by id
     */
    public function list(int $id): array|null
    {
        $element = null;
        foreach($this->elements as $key => $value) {
            if(isset($value['id']) && $value['id'] === $id) {
               
                return $element = $value;
            }
        }
        return $element;
    }

    public function convertToGrams($element): array
    {
        if($element['unit'] === 'kg') {
            $element['quantity'] = $element['quantity'] * 1000;
            $element['unit'] = 'g';
        }
        return $element;
    }
}