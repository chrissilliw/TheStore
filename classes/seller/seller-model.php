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

}