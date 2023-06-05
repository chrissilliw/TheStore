<?php

require 'classes/seller/seller-view.php';
require 'classes/seller/seller-model.php';
// require 'classes/seller/seller-collection.php';

$pdo = require 'partials/connect.php';

$SellerModel = new SellerModel($pdo);
$SellerView = new SellerView($pdo);
// $SellerCollection = new SellerCollection($pdo);

include 'partials/header.php';
include 'partials/menu.php';

include 'partials/seller-form.php';

$SellerView->renderAllSellersAsList($SellerModel->getAllSellersOrderedAsc());

$SellerView->renderAllTheSellers($SellerModel->getAllTheSellers());

include 'partials/footer.php';