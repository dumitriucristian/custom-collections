<?php

namespace App\Collections;


class FruitCollection  extends AbstractFoodCollection implements IFoodCollection
{
    
    private $type = "fruit";
    
    public function __construct(array $elements)
    {
        parent::__construct();
        //$this->elements = $this->fruits($elements);
    }

    public function add(mixed $element): void
    {
        if (is_object($element)) {
            $element = (array) $element ;
        }
            
        if ( ! empty($element["type"]) && $element["type"] == $this->type) {
            $this->elements[] = $this->convertToGrams($element);
        }
    }

    private function fruits(array $elements)
    {
       
        $fruits = [];
        foreach($elements as $key => $value) {
            if($value['type'] == $this->type) {
                $fruits[] =$value;
            }
        }

        return $fruits;

    }

}