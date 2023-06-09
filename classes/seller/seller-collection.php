<?php

require_once 'seller.php';

class SellerCollection {

    private $collection = [];
    
    public function addSeller(Seller $s): void {
        array_push($this->collection, $s);
    }

    public function addSellers(array $s): void {
        $this->collection = array_merge($this->collection, $m);
    }

    public function getAllSellers(): array {
        return $this->collection;
    }

    public function getSeller(int $s): Seller {
        return $this->collection[$m-1];
    }

}