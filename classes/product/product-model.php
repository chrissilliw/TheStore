<?php 

require_once(__DIR__.'/../db.php');
require_once 'product.php';

class ProductModel extends DB {

    protected $table = "products";

    public function getAllProducts() {
        return $this->getAll($this->table);
    }

    public function addSeller(string $name, string $description, int $type, int $brand, int $quality, int $size, int $color, int $price) {
        $sql = "INSERT INTO {$this->table} (prod_name, prod_description, type_id, brand_id, quality_id, size_id, color_id, prod_price) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$name, $description, $type, $brand, $quality, $size, $color, $price]);
    }

    public function getAllTheProducts() {
        $sql = 
            "SELECT products.prod_name, products.prod_description, 
                    product_types.product_type_name, 
                    product_brands.product_brand_name,
                    product_sizes.product_size_name,
                    product_colors.product_color_name,
                    product_quality.product_quality_name FROM products
            JOIN product_types on products.type_id = product_types.product_type_id
            JOIN product_brands on products.brand_id = product_brands.product_brand_id
            JOIN product_sizes on products.size_id = product_sizes.product_size_id
            JOIN product_colors on products.color_id = product_colors.product_color_id
            JOIN product_quality on products.quality_id = product_quality.product_quality_id
            ";
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            $allProducts = $statement->fetchAll(PDO::FETCH_ASSOC);
            $ProductCollection = new ProductCollection();
            foreach($allProducts as $product) {
                $newProduct = new Product($product['prod_id'], $product['prod_name'], $product['prod_description'], $product['type_id'], $product['brand_id'], $product['quality_id'], $product['size_id'], $product['color_id'], $product['prod_price']);
                $ProductCollection->addProduct($newProduct);
            }
            return $ProductCollection;
    }

}