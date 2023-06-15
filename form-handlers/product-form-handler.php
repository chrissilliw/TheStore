<?php 

require '../classes/product/product-model.php';

$pdo = require '../partials/connect.php';
$productModel = new ProductModel($pdo);

    if(empty($_POST['prod_name'])) {
        $name_error = 'Please insert your username';
    }

    if(!empty(   
        ($_POST['prod_name']) &&
        ($_POST['prod_desc']) &&
        ($_POST['brand_id']) &&
        ($_POST['type_id']) &&
        ($_POST['size_id']) &&
        ($_POST['color_id']) &&
        ($_POST['quality_id']) && 
        ($_POST['seller_id']) && 
        $_POST['prod_price'])) {

        $name = filter_var($_POST['prod_name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_var($_POST['prod_desc'], FILTER_SANITIZE_SPECIAL_CHARS);
        $brandId = filter_var($_POST['brand_id'], FILTER_SANITIZE_NUMBER_INT);
        $typeId = filter_var($_POST['type_id'], FILTER_SANITIZE_NUMBER_INT);
        $sizeId = filter_var($_POST['size_id'], FILTER_SANITIZE_NUMBER_INT);
        $colorId = filter_var($_POST['color_id'], FILTER_SANITIZE_NUMBER_INT);
        $qualityId = filter_var($_POST['quality_id'], FILTER_SANITIZE_NUMBER_INT);
        $sellerId = filter_var($_POST['seller_id'], FILTER_SANITIZE_NUMBER_INT);
        $price = filter_var($_POST['prod_price'], FILTER_SANITIZE_NUMBER_INT);

        $productModel->addProduct($name, $description, (int)$typeId, (int)$brandId, (int)$qualityId, (int)$sizeId, (int)$colorId, (int)$sellerId, (int)$price, 0);
    }

 header("Location: ../products.php");
?>