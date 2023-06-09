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

    public function addProduct(string $name, string $description, int $type, int $brand, int $quality, int $size, int $color, int $seller, int $price, int $is_sold) {
        $sql = "INSERT INTO {$this->table} (prod_name, prod_description, type_id, brand_id, quality_id, size_id, color_id, seller_id, prod_price, is_sold) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$name, $description, $type, $brand, $quality, $size, $color, $seller, $price, $is_sold]);
    }


    public function updateToSoldProduct(int $prod_id): void {
        $sql = 
        "UPDATE products
        SET is_sold = 1
        WHERE prod_id = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$prod_id]);
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
                    sellers.sellers_firstname, 
                    sellers.sellers_lastname,
                    products.prod_price,
                    products.is_sold FROM products
            JOIN product_types on products.type_id = product_types.product_type_id
            JOIN product_brands on products.brand_id = product_brands.product_brand_id
            JOIN product_sizes on products.size_id = product_sizes.product_size_id
            JOIN product_colors on products.color_id = product_colors.product_color_id
            JOIN product_quality on products.quality_id = product_quality.product_quality_id
            JOIN sellers on products.seller_id = sellers.id
            ";
            $statement = $this->pdo->prepare($sql);
            $statement->execute();
            $allProducts = $statement->fetchAll(PDO::FETCH_ASSOC);
            $ProductCollection = new ProductCollection();
            foreach($allProducts as $product) {
                $newProduct = new Product($product['prod_id'], $product['prod_name'], $product['prod_description'], 
                                            $product['product_type_name'], $product['product_brand_name'], $product['product_quality_name'], 
                                            $product['product_size_name'], $product['product_color_name'], $product['sellers_firstname'], $product['prod_price'], $product['is_sold']);
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
        sellers.sellers_firstname, 
        sellers.sellers_lastname,
        products.prod_price, 
        products.is_sold FROM products
        JOIN product_types on products.type_id = product_types.product_type_id
        JOIN product_brands on products.brand_id = product_brands.product_brand_id
        JOIN product_sizes on products.size_id = product_sizes.product_size_id
        JOIN product_colors on products.color_id = product_colors.product_color_id
        JOIN product_quality on products.quality_id = product_quality.product_quality_id
        JOIN sellers on products.seller_id = sellers.id
        WHERE products.seller_id = {$p}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $allProducts = $statement->fetchAll(PDO::FETCH_ASSOC);
        $ProductCollection = new ProductCollection();
        foreach($allProducts as $product) {
            $newProduct = new Product($product['prod_id'], $product['prod_name'], $product['prod_description'], 
                                    $product['product_type_name'], $product['product_brand_name'], $product['product_size_name'], 
                                    $product['product_color_name'], $product['product_quality_name'], $product['sellers_firstname'], $product['prod_price'], $product['is_sold']);
            $ProductCollection->addProduct($newProduct);
        }
        return$ProductCollection;
    }

}