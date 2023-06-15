<?php

require_once 'sellerId.php';

class SellerIdCollection {

    private $collection = []; 

    public function addSellerId(SellerId $si): void {
        array_push($this->collection, $si);
    }

    public function getAllSellerIds(): array {
        return $this->collection; 
    }
}