<?php 

class Product {

    private $id;
    private $name;
    private $description;
    private $type;
    private $brand;
    private $quality;
    private $size;
    private $color;
    private $seller;
    private $price; 
    private $is_sold;

    public function __construct(int $id, string $name, string $description, string $type, string $brand, string $quality, string $size, string $color, string $seller, int $price, int $is_sold) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
        $this->brand = $brand;
        $this->quality = $quality;
        $this->size = $size;
        $this->color = $color;
        $this->seller = $seller;
        $this->price = $price;
        $this->is_sold = $is_sold;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getType(): string {
        return $this->type;
    }

    public function getBrand(): string {
        return $this->brand;
    }

    public function getQuality(): string {
        return $this->quality;
    }

    public function getSize(): string {
        return $this->size;
    }

    public function getColor(): string {
        return $this->color;
    }

    public function getSeller(): string {
        return $this->seller;
    }

    public function getPrice(): string {
        return $this->price;
    }

    public function getIsSold(): int {
        return $this->is_sold;
    }

}