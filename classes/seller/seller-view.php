<?php 

require_once 'seller.php';
require_once 'seller-model.php';

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

    public function renderSellerForTable(SellerCollection $sc): void {
        echo "
        <table>
        <thead>
            <tr>
                <th>Förnamn</th>
                <th>Efternamn</th>
                <th>E-postadress</th>
            </tr>
        </thead>
        <tbody>";
        foreach($sc->getAllSellers() as $seller) {
            echo "
            <tr>
                <td>{$seller->getFirstname()}</td>
                <td>{$seller->getLastName()}</td>
                <td>{$seller->getEmail()}</td>
               <td><a href='?id={$seller->getId()}' class='more-info-btn' id='more-info-btn'>Mer Info</a></td>
            </tr>
            ";
        }
        echo "</tbody></table>";
    }
    
    public function renderSellerInfo(Seller $s): void {
        echo    "<i class='fa-regular selected-seller-icon fa-user'></i> 
                <h3>{$s->getFirstname()} {$s->getLastname()}</h3>
                <p>Antal inlämnade plagg: {}</p>
                <p>Antal inlämnade plagg: </p>
                <p>Antal sålda plagg: </p>
                <p>Totala försäljningssumman: </p>
                <p>Alla plagg som säljaren har lämnat in: </p>
        ";

    }

}