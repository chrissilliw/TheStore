<?php 

class SellerView {

    public function renderAllSellersAsList(array $sellers): void {
        echo "<ul>";
        foreach($sellers as $seller) {
            echo "<li><a href='?id={$seller['sellers_firstname']}'>{$seller['sellers_firstname']} {$seller['sellers_lastname']}</a></li>";
        }
        echo "</ul>";
    }

    public function renderAllTheSellers(array $sellers): void {
        echo "<ul>";
        foreach($sellers as $seller) {
            echo "<li><a href='?id={$seller['sellers_firstname']}'>{$seller['sellers_firstname']} {$seller['sellers_lastname']}</a></li>";
        }
        echo "</ul>";
    }
    
}