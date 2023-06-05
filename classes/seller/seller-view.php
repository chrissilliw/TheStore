<?php 

//§require_once 'seller.php';

class SellerView {

    public function renderAllSellersAsList(array $sellers): void {
        echo "<ul>";
        foreach($sellers as $seller) {
            echo "<li><a href='?id={$seller['sellers_firstname']}'>{$seller['sellers_firstname']} {$seller['sellers_lastname']}</a></li>";
        }
        echo "</ul>";
    }

    public function renderAllTheSellers(SellerCollection $sc): void {
        echo "<ul>";
        foreach($sc->getAllSellers() as $seller) {
            echo "<li><a href='?id={$seller->getId()}'>{$seller->getFirstname()} {$seller->getLastname()}</a></li>";
        }
        echo "</ul>";
    }
    
    public function renderSellerInfo(Seller $s): void {
        echo "<h3>{$s->getFirstname} {$s->getLastname}</h3>";
        
    }

}