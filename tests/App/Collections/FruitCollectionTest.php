<?php

namespace App\Tests\App\Service;

use App\Collections\FruitCollection;
use PHPUnit\Framework\TestCase;

class FruitCollectionTest extends TestCase
{
    private $fruit1;
    private $fruit2;
    private $fruit3;

    protected function setUp():void 
    {
        $this->fruit1 =   [
            'id'=>1,
            'name'=>"someId",
            'unit'=>'kg',
             'type'=>'fruit',
            'quantity'=>5
            ];

        $this->fruit2 =  [
            'id'=>2,
            'name'=>"someId",
            'unit'=>'kg',
            'type'=>'fruit',
            'quantity'=>5
        ];

        $this->fruit3 = [
            'id'=>3,
            'name'=>"someId",
            'unit'=>'kg',
            'type'=>'vegetables',
            'quantity'=>5
        ];

    }

    public function testOneElement(): void
    {
        $fruitCollection = new FruitCollection();
        
    
        $fruitCollection->add($this->fruit1);
        $fruitCollection->add($this->fruit2);
        $fruitCollection->add($this->fruit3); //this is an invalid type if ok  is skipped

        $this->assertCount(2,$fruitCollection);
    }

    public function testSkipElementWithoutType(): void
    {
        $fruitCollection = new FruitCollection();
        
        $validFruit = [
            'id'=>1,
            'name'=>"someId",
            'unit'=>'kg',
            'type'=>'fruit',
            'quantity'=>5
        ];

        $invalidFruit = [
            'id'=>2,
            'name'=>"someId",
            'unit'=>'kg',
            'quantity'=>5
        ];

        $fruitCollection->add($validFruit);
        $fruitCollection->add($invalidFruit);

        $this->assertCount(1,$fruitCollection);
    }

    
    public function testSkipEmptyElement(): void
    {
        $fruitCollection = new FruitCollection();
        $fruit1 =  [
            'id'=>1,
            'name'=>"someId",
            'unit'=>'kg',
            'type'=>'fruit',
            'quantity'=>5
        ];

        $fruit2 = [];
            
        $fruitCollection->add($fruit1);
        $fruitCollection->add($fruit2);

        $this->assertCount(1,$fruitCollection);
    }

   public function testRemoveElementByIndex()
    {
        $fruits = [
            [
            'id' => 1,
            'name' => "someId",
            'unit' => 'kg',
            'type' => 'fruit',
            'quantity' => 5,
            ],

            [
                'id'    => 2,
                'name'  => "someId",
                'unit'  => 'kg',
                'type'  => 'fruit',
                'quantity' => 5,
            ],
        ];

        
        $fruitCollection = new FruitCollection( $fruits);
        $this->assertCount(2, $fruitCollection);

        $fruitCollection->remove(0);
        $this->assertCount(1, $fruitCollection);
    }

    public function testRemoveElementByObject()
    {
        $fruits = [
            [
            'id' => 1,
            'name' => "someId",
            'unit' => 'kg',
            'type' => 'fruit',
            'quantity' => 5,
            ],

            [
                'id'    => 3,
                'name'  => "someId",
                'unit'  => 'kg',
                'type'  => 'fruit',
                'quantity' => 5,
            ],
        ];

              
        $fruitCollection = new FruitCollection($fruits);
        
        $this->assertCount(2, $fruitCollection);
        $first =  (object) $fruitCollection->first();
        
        $fruitCollection->remove($first);
        $this->assertCount(1, $fruitCollection);
    }

    public function testCanListElement()
    {
        $fruits = [
            [
            'id' => 3,
            'name' => "someId",
            'unit' => 'kg',
            'type' => 'fruit',
            'quantity' => 5,
            ],

            [
                'id'    => 6,
                'name'  => "someId",
                'unit'  => 'kg',
                'type'  => 'vegetable',
                'quantity' => 5,
            ],
        ];

              
        $fruitCollection = new FruitCollection($fruits);
        $listed = $fruitCollection->list(3);

        $this->assertEquals($fruits[0], $listed);
    }


    public function testListMissingElement()
    {
        $fruits = [
            [
            'id' => 2, 
            'name' => "someId",
            'unit' => 'kg',
            'type' => 'fruit',
            'quantity' => 5,
            ],

            [
                'id'    => 6,
                'name'  => "someId",
                'unit'  => 'kg',
                'type'  => 'vegetable',
                'quantity' => 5,
            ],
        ];

              
        $fruitCollection = new FruitCollection($fruits);
        $listed = $fruitCollection->list(300); //invalidIndex

        $this->assertNull($listed);
    }
}