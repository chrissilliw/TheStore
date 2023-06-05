<?php 

require_once(__DIR__.'/../db.php');

class ProductModel extends DB {

    protected $table = "products";

    public function getAllProducts() {
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
            return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}