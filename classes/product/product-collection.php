<?php

require_once 'product.php';

class ProductCollection {

    private $collection = [];

    public function addProduct(Product $p): void {
        array_push($this->collection, $p);
    }

    public function addProducts(Product $p): void {
        $this->collection = array_merge($this->collection, $p);
    }

    public function getAllProducts(): array {
        return $this->collection;
    }
}