<?php 

class Product {

    private int $id;
    private string $name;
    private string $description;
    private string $type;
    private string $brand;
    private string $quality;
    private string $size;
    private string $color;
    private int $price; 

    public function __construct($id, $name, $description, $type, $brand, $quality, $size, $color, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
        $this->brand = $brand;
        $this->quality = $quality;
        $this->size = $size;
        $this->color = $color;
        $this->price = $price;
    }

}