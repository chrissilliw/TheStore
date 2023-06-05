<?php

require 'classes/seller/seller-view.php';
require 'classes/seller/seller-model.php';
require 'classes/seller/seller-collection.php';

$pdo = require 'partials/connect.php';

$SellerModel = new SellerModel($pdo);
$SellerView = new SellerView($pdo);

include 'partials/header.php';
include 'partials/menu.php';

include 'partials/seller-form.php';

//$SellerView->renderAllSellersAsList($SellerModel->getAllSellersOrderedAsc());

$SellerView->renderAllTheSellers($SellerModel->getAllTheSellers());

if(isset($_GET['id'])) {
    $id = (int) filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    var_dump($id);
    $sellerCollection = $SellerModel->getAllTheSellers();
    $single_seller = $sellerCollection->getSeller($id);

    var_dump($single_seller);
    //$SellerView->renderSellerInfo($single_seller);
}


include 'partials/footer.php';