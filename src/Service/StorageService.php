<?php

namespace App\Service;

use App\Collections\VegetableCollection;
use App\Collections\FruitCollection;

class StorageService
{
    protected string $request = '';

    public function __construct( string $request )
    {
        $this->request = $request;
    }

    public function getRequest(): string
    {
        return $this->request;
    }

    public function addFruits(): FruitCollection
    {
        $elements = json_decode($this->request);
    
        $fruitCollection = new FruitCollection($elements);
        dd($fruitCollection);
        /*
        foreach($elements as $key => $value) {
            $fruitCollection->add($value);
        }
        */
          dd($fruitCollection);
        return $fruitCollection;
    }   

    public function addVegetables(): VegetableCollection
    {
        $elements = json_decode($this->request);
        $vegetableCollection = new VegetableCollection();
        foreach($elements as $key => $value) {
            $vegetableCollection->add($value);
        }
       // dd($vegetableCollection);
        return $vegetableCollection;
    } 

}
