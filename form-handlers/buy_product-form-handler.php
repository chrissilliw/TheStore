<?php

require '../classes/product/product-model.php';

$pdo = require '../partials/connect.php';
$productModel = new ProductModel($pdo);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['sell-btn'])) {
         $prodId = filter_var($_POST['sell-btn'], FILTER_SANITIZE_NUMBER_INT);

         $productModel->updateToSoldProduct((int)$prodId);

        echo "funka";

    }

    header("Location: ../products.php");

}