<?php

require_once(__DIR__.'/../db.php');
require_once 'seller.php';
require_once 'seller-collection.php';

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
        "SELECT s.sellers_firstname, COUNT(s.id) FROM sellers AS s 
        JOIN products AS p ON p.seller_id = s.id
        WHERE s.id = {$m}";
        //GROUP BY s.id";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $fetchedData = $statement->fetchAll(PDO::FETCH_ASSOC);
        $numberOfGarments = $fetchedData[0]['COUNT(s.id)'];
        //$numberOfGarments = $fetchedData[0];
        $value =  (int) $numberOfGarments;
        return $value;
    }

    public function getSellersNumbersOfSoldGarments(int $m) {
        $sql = 
        "SELECT COUNT(s.id) FROM sellers AS s 
        JOIN products AS p ON p.seller_id = s.id
        WHERE s.id = {$m} AND p.is_sold > 0";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $fetchedData = $statement->fetchAll(PDO::FETCH_ASSOC);
        $totalSoldGarments = $fetchedData[0]['COUNT(s.id)'];
        $value = (int) $totalSoldGarments;
        return $value;
    }

    public function getSellersTotalSaleOfSoldGarments(int $m) {
        $sql = 
        "SELECT SUM(p.prod_price) FROM products AS p
        JOIN sellers AS s ON s.id = p.seller_id
        WHERE s.id = {$m} AND p.is_sold > 0";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $fetchedData = $statement->fetchAll(PDO::FETCH_ASSOC);
        $totalSaleAmount = $fetchedData[0]['SUM(p.prod_price)'];
        $value = (int) $totalSaleAmount;
        return $value;
    }
}