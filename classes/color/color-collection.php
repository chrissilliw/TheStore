<?php

require_once 'color.php';

class ColorCollection {

    private $collection = []; 

    public function addColor(Color $c): void {
        array_push($this->collection, $c);
    }

    public function getAllColors(): array {
        return $this->collection; 
    }
}