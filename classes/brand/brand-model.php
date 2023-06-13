<?php 

require_once(__DIR__.'/../db.php');

class BrandModel extends DB {

    protected $table = "product_brands";

    public function getAllBrands() {
        return $this->getAll($this->table);
    }

    public function getAllBrandsInOrder() {
        $sql = 
        "SELECT product_brand_name FROM product_brands
        ORDER BY product_brand_name ASC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}