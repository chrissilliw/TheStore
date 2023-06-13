<?php

require_once 'classes/seller/seller-view.php';

//require_once 'classes/db.php';
require_once 'classes/seller/seller-model.php';
require_once 'classes/product/product-model.php';

//require_once 'classes/seller/seller-collection.php';

$pdo = require 'partials/connect.php';

$db = new DB($pdo);
$SellerModel = new SellerModel($pdo);
$ProductModel = new ProductModel($pdo);
$SellerView = new SellerView();

$sellers = $SellerModel->getAllTheSellers();
//$sellerView->renderSellerForTable($sellers);

//$SellerView->renderAllTheSellers($SellerModel->getAllTheSellers());

?>

<main>
            <h1>Säljare</h1>

             <section class="section-half">
                <div class="sales white-card">
                <span class="material-symbols-sharp icon-span">person_add</span>

                <?php
                    include 'partials/seller-form.php';
                ?>

                </div>
                <div class="garments white-card">
                <span class="material-symbols-sharp icon-span">group</span>
                <?php
                
                    if(isset($_GET['id'])) {
                        $id = (int) filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
                        //var_dump($id);
                        $single_seller = $SellerModel->getSeller($id);

                        $sellerNumberOfGarment = $SellerModel->getSellersNumberOfGarmentsSubmitted($id);
                        $sellerstotalSoldGarments = $SellerModel->getSellersNumbersOfSoldGarments($id);
                        //$listofSellersGarment = $SellerModel->getSellersAllGarments($id);
                        $sellerstotalSumOfSales = $SellerModel->getSellersTotalSaleOfSoldGarments($id);

                        $listOfSellersGarments = $ProductModel->getAllProductsFromSeller($id);

                        //$SellerView->renderSellerInfo($single_seller);
                        
                        echo "
                            <ul>
                                <li>{$single_seller->getFirstname()} {$single_seller->getLastname()}</li>
                                <li>Antal inlämnade plagg: {$sellerNumberOfGarment}</li>
                                <li>Antal sålda plagg: {$sellerstotalSoldGarments}</li>
                                <li>Totala Försäljningssumman: {$sellerstotalSumOfSales}</li>
                                <li>Alla plagg: <li>
                                <ul>";
             
                                    foreach ($listOfSellersGarments->getAllProducts() as $product) {
                                        echo "<li>{$product->getName()} / {$product->getDescription()} / {$product->getType()}</li>";
                                    }
                        echo    "</ul>
                            </ul>
                        ";
                    }
                ?>
                </div>
            </section>

            <section class="section-full">
                <h2>Lista över säljare</h2>
                    <?php $SellerView->renderSellerForTable($sellers); ?>
            </section>
        </main>