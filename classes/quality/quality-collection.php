<?php

require_once 'quality.php';

class QualityCollection {

    private $collection = []; 

    public function addQuality(Quality $q): void {
        array_push($this->collection, $q);
    }

    public function getAllQualities(): array {
        return $this->collection; 
    }
}