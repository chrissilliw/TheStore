<?php 

require_once(__DIR__.'/../db.php');
require_once 'brand.php';
require_once 'brand-collection.php';

class BrandModel extends DB {

    protected $table = "product_brands";

    public function getAllBrands() {
        return $this->getAll($this->table);
    }

    public function getAllBrandsInOrder() {
        $sql = 
        "SELECT product_brands.product_brand_id, product_brands.product_brand_name FROM product_brands
        ORDER BY product_brand_name ASC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $allBrands = $statement->fetchAll(PDO::FETCH_ASSOC);
        $BrandCollection = new BrandCollection();
        foreach($allBrands as $brand) {
            $newBrand = new Brand($brand['product_brand_id'], $brand['product_brand_name']);
            $BrandCollection->addBrand($newBrand);
        }
        return $BrandCollection;
    }
}