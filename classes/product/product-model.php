<?php 

require_once(__DIR__.'/../db.php');
require_once 'product.php';
require_once 'product-collection.php';

class ProductModel extends DB {

    protected $table = "products";

    public function getAllProducts() {
        return $this->getAll($this->table);
    }

    public function addNewProduct(string $name, string $description, int $type, int $brand, int $quality, int $size, int $color, int $price) {
        $sql = "INSERT INTO {$this->table} (prod_name, prod_description, type_id, brand_id, quality_id, size_id, color_id, prod_price) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$name, $description, $type, $brand, $quality, $size, $color, $price]);
    }

    public function addProduct(string $name, string $description, string $type, string $brand, string $quality, string $size, string $color, int $price) {
        $sql = "INSERT INTO {$this->table} (prod_name, prod_description, type_id, brand_id, quality_id, size_id, color_id, prod_price) VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$name, $description, $type, $brand, $quality, $size, $color, $price]);
    }

    public function getAllTheProducts() {
        $sql = 
            "SELECT products.prod_id, products.prod_name, 
                    products.prod_description, 
                    product_types.product_type_name, 
                    product_brands.product_brand_name,
                    product_sizes.product_size_name,
                    product_colors.product_color_name,
                    product_quality.product_quality_name,
                    products.prod_price FROM products
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
                $newProduct = new Product($product['prod_id'], $product['prod_name'], $product['prod_description'], 
                                            $product['product_type_name'], $product['product_brand_name'], $product['product_size_name'], 
                                            $product['product_color_name'], $product['product_quality_name'], $product['prod_price']);
                $ProductCollection->addProduct($newProduct);
            }
            return $ProductCollection;
    }

    public function getAllProductsFromSeller(int $p) {
        $sql = 
        "SELECT products.prod_id, products.prod_name, products.prod_description, 
        product_types.product_type_name, 
        product_brands.product_brand_name,
        product_sizes.product_size_name,
        product_colors.product_color_name,
        product_quality.product_quality_name,
        products.prod_price FROM products
        JOIN product_types on products.type_id = product_types.product_type_id
        JOIN product_brands on products.brand_id = product_brands.product_brand_id
        JOIN product_sizes on products.size_id = product_sizes.product_size_id
        JOIN product_colors on products.color_id = product_colors.product_color_id
        JOIN product_quality on products.quality_id = product_quality.product_quality_id
        WHERE products.seller_id = {$p}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $allProducts = $statement->fetchAll(PDO::FETCH_ASSOC);
        $ProductCollection = new ProductCollection();
        foreach($allProducts as $product) {
            $newProduct = new Product($product['prod_id'], $product['prod_name'], $product['prod_description'], 
                                    $product['product_type_name'], $product['product_brand_name'], $product['product_size_name'], 
                                    $product['product_color_name'], $product['product_quality_name'], $product['prod_price']);
            $ProductCollection->addProduct($newProduct);
        }
        // $product_name = $product[0]['prod_name'];
        // $product_description = $product[0]['product_description'];
        // $product_type = $product[0]['product_type_name'];
        // $product_brand = $product[0]['product_brand_name'];
        // $product_size = $product[0]['product_size_name'];
        // $product_color = $product[0]['product_color_name'];
        // $product_quality = $product[0]['product_quality_name'];
        return$ProductCollection;
    }

        // public function getAllProductsFromSeller(int $p) {
    //     $sql = 
    //         "SELECT products.prod_name, products.prod_description, 
    //             product_types.product_type_name, 
    //             product_brands.product_brand_name,
    //             product_sizes.product_size_name,
    //             product_colors.product_color_name,
    //             product_quality.product_quality_name FROM products
    //             JOIN product_types on products.type_id = product_types.product_type_id
    //             JOIN product_brands on products.brand_id = product_brands.product_brand_id
    //             JOIN product_sizes on products.size_id = product_sizes.product_size_id
    //             JOIN product_colors on products.color_id = product_colors.product_color_id
    //             JOIN product_quality on products.quality_id = product_quality.product_quality_id
    //             WHERE products.seller_id = {$m}";
    //         $statement = $this->pdo->prepare($sql);
    //         $statement->execute();
    //         $allProducts = $statement->fetchAll(PDO::FETCH_ASSOC);
    //         $ProductCollection = new ProductCollection();
    //         foreach($allProducts as $product) {
    //             $newProduct = new Product($product['prod_id'], $product['prod_name'], $product['prod_description'], 
    //                                         $product['product_type_name'], $product['product_brand_name'], $product['product_size_name'], 
    //                                         $product['product_color_name'], $product['product_quality_name'], $product['prod_price']);
    //             $ProductCollection->addProduct($newProduct);
    //         }
    //         //var_dump($ProductCollection);
    //         return $ProductCollection;
    // }

}