<?php

require_once 'size.php';

class SizeCollection {

    private $collection = []; 

    public function addSize(Size $s): void {
        array_push($this->collection, $s);
    }

    public function getAllSizes(): array {
        return $this->collection; 
    }
}