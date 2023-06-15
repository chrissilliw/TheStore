<?php

require_once 'brand.php';

class BrandCollection {

    private $collection = []; 

    public function addBrand(Brand $b): void {
        array_push($this->collection, $b);
    }

    public function getAllBrands(): array {
        return $this->collection; 
    }
}