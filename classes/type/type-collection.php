<?php

require_once 'type.php';

class TypeCollection {

    private $collection = []; 

    public function addType(Type $t): void {
        array_push($this->collection, $t);
    }

    public function getAllTypes(): array {
        return $this->collection; 
    }
}