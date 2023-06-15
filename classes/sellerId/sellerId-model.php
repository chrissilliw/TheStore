<?php 

require_once(__DIR__.'/../db.php');
require_once 'sellerId.php';
require_once 'sellerId-collection.php';

class SellerIdModel extends DB {

    protected $table = "sellers";

    public function getAllSellers() {
        return $this->getAll($this->table);
    }

    public function getAllSellersInOrder() {
        $sql = 
        "SELECT sellers.id, sellers.sellers_firstname, sellers.sellers_lastname FROM sellers
        ORDER BY sellers.sellers_firstname ASC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $allSellers = $statement->fetchAll(PDO::FETCH_ASSOC);
        $SellerIdCollection = new SellerIdCollection();
        foreach($allSellers as $seller) {
            $newSeller = new SellerId($seller['id'], $seller['sellers_firstname'], $seller['sellers_lastname']);
            $SellerIdCollection->addSellerId($newSeller);
        }
        return $SellerIdCollection;
    }
}