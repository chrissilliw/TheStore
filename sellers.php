<?php

require 'classes/seller/seller-view.php';
require 'classes/seller/seller-model.php';

$pdo = require 'partials/connect.php';

$SellerModel = new SellerModel($pdo);
$SellerView = new SellerView($pdo);

include 'partials/header.php';
include 'partials/menu.php';

include 'partials/seller-form.php';

$SellerView->renderAllSellersAsList($SellerModel->getAllSellersOrderedAsc());

include 'partials/footer.php';