<?php

require_once 'product.php';

class ProductCollection {

    private $collection = [];

    public function addProduct(Product $p): void {
        array_push($this->collection, $p);
    }

    public function getAllProducts(): array {
        return $this->collection;
    }
}