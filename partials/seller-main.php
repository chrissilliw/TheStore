<?php

require_once 'classes/seller/seller-view.php';

require_once 'classes/seller/seller-model.php';
require_once 'classes/product/product-model.php';

$pdo = require 'partials/connect.php';

$db = new DB($pdo);
$SellerModel = new SellerModel($pdo);
$ProductModel = new ProductModel($pdo);
$SellerView = new SellerView();

$sellers = $SellerModel->getAllTheSellers();


?>

<main>
    <section class="section-top">
        <div class="white-card">
            <h1>Säljare</h1>
        </div>
    </section>

    <section class="section-half">
        <div class="sales white-card">
            <span class="material-symbols-sharp icon-span">person_add</span>
            <?php
                include 'partials/seller-form.php';
            ?>

        </div>
        <div class="garments white-card">
            <span class="material-symbols-sharp icon-span">person</span>
            <?php
            
                if(isset($_GET['id'])) {
                    $id = (int) filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

                    $single_seller = $SellerModel->getSeller($id);

                    $sellerNumberOfGarment = $SellerModel->getSellersNumberOfGarmentsSubmitted($id);
                    $sellerstotalSoldGarments = $SellerModel->getSellersNumbersOfSoldGarments($id);
                    $sellerstotalSumOfSales = $SellerModel->getSellersTotalSaleOfSoldGarments($id);

                    $listOfSellersGarments = $ProductModel->getAllProductsFromSeller($id);
                    
                    echo "
                        <div class='user-card'>
                            <span class='avatar-icon'></span>
                            <h3 class='user-card-name'>{$single_seller->getFirstname()} {$single_seller->getLastname()}</h3>
                            <h3 class='user-card-email'>{$single_seller->getEmail()}</h3>
                            <div class='info-box-section'>
                                <div class='info-box box-left'>
                                    <h3 class='info-box-number'>{$sellerNumberOfGarment}</h3>
                                    <span class='info-text'>Inlämnade plagg</span>
                                </div>
                                <div class='info-box box-right'>
                                    <div class='info-box-number-group'>
                                        <h3 class='info-box-number'>{$sellerstotalSoldGarments}</h3>
                                        
                                    </div>
                                    <span class='info-text'>Sålda plagg</span>
                                </div>
                            </div>
                            <h3 class='user-card-sales'>Försäljning totalt: $ {$sellerstotalSumOfSales}</h3>
                            <li>Alla plagg: <li>
                            <ul>";
            
                                foreach ($listOfSellersGarments->getAllProducts() as $product) {
                                    echo "<li> {$product->getName()} / {$product->getDescription()} / {$product->getType()}</li>";
                                }
                    echo    "</ul>
                        </ul>
                    ";
                }
            ?>
        </div>
    </section>

    <section class="section-full">
        <span class="material-symbols-sharp icon-span">group</span>
        <h2>Lista över säljare</h2>
            <?php $SellerView->renderSellerForTable($sellers); ?>
    </section>
</main>