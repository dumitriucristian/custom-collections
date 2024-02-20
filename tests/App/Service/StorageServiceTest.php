<?php

namespace App\Tests\App\Service;


use App\Service\StorageService;
use PHPUnit\Framework\TestCase;

class StorageServiceTest extends TestCase
{
    private $storageService ;

    protected function setUp():void 
    {
        $request = file_get_contents('request.json');
        $this->storageService = new StorageService($request);

    }

    public function testReceivingRequest(): void
    {
        $this->assertNotEmpty($this->storageService->getRequest());
        $this->assertIsString($this->storageService->getRequest());
    }

    public function testCanAddFruits()
    {
      
        $fruitCollection =  $this->storageService->addFruits();
   
        $this->assertIsObject($fruitCollection,'Is not an object');
        $this->assertIsIterable($fruitCollection,'Is not iterable');
        $this->assertNotEmpty($fruitCollection, 'Empty fruit collection');
        $this->assertInstanceOf(get_class($fruitCollection),$fruitCollection);
    }

    public function testCanAddVegetables()
    {
      
        $vegetableCollection =  $this->storageService->addVegetables();
   
        $this->assertIsObject($vegetableCollection,'Is not an object');
        $this->assertIsIterable($vegetableCollection,'Is not iterable');
        $this->assertNotEmpty($vegetableCollection, 'Empty fruit collection');
        $this->assertInstanceOf(get_class($vegetableCollection),$vegetableCollection);
    }
}
