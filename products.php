<?php

require 'classes/product/product-view.php';
require 'classes/product/product-model.php';

$pdo = require 'partials/connect.php';

$ProductModel = new ProductModel($pdo);
$ProductView = new ProductView($pdo);

include 'partials/header.php';
include 'partials/menu.php';

$ProductView->renderAllProductsAsList($ProductModel->getAllProducts());

include 'partials/footer.php';