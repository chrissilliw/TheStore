<?php

require 'classes/seller/seller-view.php';

require 'classes/db.php';
require 'classes/seller/seller-model.php';

$pdo = require 'partials/connect.php';

$db = new DB($pdo);
$sellerModel = new SellerModel($pdo);
$sellerView = new SellerView();

include 'partials/header.php';
include 'partials/menu.php';

$sellers = $sellerModel->getAllSellers("sellers");
$sellerView->renderAllSellersAsList($sellers);

include 'partials/footer.php';