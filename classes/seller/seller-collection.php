<?php

require 'seller.php';

class SellerCollection {

    private $collection = [];
    
    public function addSeller(Seller $s): void {
        array_push($this->collection, $s);
    }

}