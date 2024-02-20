<?php

namespace App\Collections;


interface IFoodCollection
{
    public function add(mixed $element): void ;
    public function remove(mixed $param): array | bool ;
    public function list(int $id) ;
    public function convertToGrams(int $id) ;
}