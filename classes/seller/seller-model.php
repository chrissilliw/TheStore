<?php

require_once(__DIR__.'/../db.php');
require_once 'seller.php';

class SellerModel extends DB {

    protected $table = "sellers";

    public function getAllSellers() {
        return $this->getAll($this->table);
    }

    public function getAllSellersOrderedAsc() {
        $sql = 
        "SELECT sellers.sellers_firstname, sellers.sellers_lastname FROM sellers
        ORDER BY sellers.sellers_firstname ASC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addSeller(string $firstname, string $lastname, string $email) {
        $sql = "INSERT INTO {$this->table} (sellers_firstname, sellers_lastname, sellers_email_adress) VALUES (?, ?, ?)";
        $statement = $this->pdo->prepare($sql);
        $statement->execute([$firstname, $lastname, $email]);
    }

    public function getAllTheSellers() {
        $sql = 
        "SELECT sellers.id, sellers.sellers_firstname, sellers.sellers_lastname, sellers.sellers_email_adress FROM sellers
        ORDER BY sellers.sellers_firstname ASC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $allSellers = $statement->fetchAll(PDO::FETCH_ASSOC);
        $SellerCollection = new SellerCollection();
        foreach($allSellers as $seller) {
            $newSeller = new Seller($seller['id'], $seller['sellers_firstname'], $seller['sellers_lastname'], $seller['sellers_email_adress']);
            $SellerCollection->addSeller($newSeller);
        }
        return $SellerCollection;
    }

    public function getSeller(int $m) {
        $sql = 
        "SELECT sellers.id, sellers.sellers_firstname, sellers.sellers_lastname, sellers.sellers_email_adress FROM `sellers` 
        WHERE sellers.id = {$m}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $seller =  $statement->fetchAll(PDO::FETCH_ASSOC);
        $seller_id = $seller[0]['id'];
        $seller_firstname = $seller[0]['sellers_firstname'];
        $seller_lastname = $seller[0]['sellers_lastname'];
        $seller_email = $seller[0]['sellers_email_adress'];
        $selectedSeller = new Seller($seller_id, $seller_firstname, $seller_lastname, $seller_email);
        return $selectedSeller;
    }

    public function getSellersNumberOfGarmentsSubmitted(int $m) {
        $sql = 
        "SELECT COUNT(s.id) FROM sellers AS s 
        JOIN products AS p ON p.seller_id = s.id
        WHERE s.id = {$m}
        GROUP BY s.id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $fetchedData = $statement->fetchAll(PDO::FETCH_ASSOC);
        $numberOfGarments = $fetchedData[0]['COUNT(s.id)'];
        $value =  (int) $numberOfGarments;
        return $value;
    }

    public function getSellersAllGarments(int $m) {
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
        WHERE products.seller_id = {$m}";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }


}