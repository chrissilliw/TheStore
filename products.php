<?php

require 'classes/product/product-view.php';
require 'classes/product/product-model.php';
require_once 'classes/product/product-collection.php';

// $pdo = require 'partials/connect.php';

// $ProductModel = new ProductModel($pdo);
// $ProductView = new ProductView($pdo);

include 'partials/header.php';
include 'partials/menu.php';
include 'partials/product-main.php';

//$ProductView->renderAllProductsAsList($ProductModel->getAllTheProducts());

include 'partials/footer.php';