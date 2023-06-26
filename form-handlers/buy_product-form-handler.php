<?php

require '../classes/product/product-model.php';

$pdo = require '../partials/connect.php';
$productModel = new ProductModel($pdo);

    if(isset($_POST['prod_id'])) {
         $prodId = filter_var($_POST['prod_id'], FILTER_SANITIZE_NUMBER_INT);
         $productModel->updateToSoldProduct($prodId);
         header("Location: ../products.php");

    }

