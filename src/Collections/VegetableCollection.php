<?php 

namespace App\Collections;

use App\Collections\IFoodCollection;
use App\Collections\AbstractFoodCollection;


class VegetableCollection extends AbstractFoodCollection implements IFoodCollection
{
    private $type = "vegetable";

    public function add(mixed $element): void
    {
        if (is_object($element)) {
            $element = (array) $element ;
        }
            
        if (! empty($element["type"]) && $element["type"] == $this->type) {
            $this->elements[] = $this->convertToGrams($element);
        }
    }
}