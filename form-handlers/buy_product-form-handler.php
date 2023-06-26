<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../classes/product/product-model.php';

$pdo = require '../partials/connect.php';
$productModel = new ProductModel($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST)) {
        // $prodId = null;
        // $prodId = filter_var($_POST['prod_id'], FILTER_SANITIZE_NUMBER_INT);

        // var_dump($prodId);

        $prodId = null;
        foreach ($_POST as $key => $value) {
            if(strpos($key, 'prod_id_') === 0) {
                $prodId = filter_var($value, FILTER_SANITIZE_NUMBER_INT); 
                break;
            }
        }
         $productModel->updateToSoldProduct($prodId);
    }

    header("Location: ../products.php");

}

