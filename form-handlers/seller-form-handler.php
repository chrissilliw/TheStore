<?php

require '../classes/seller/seller-model.php';

$pdo = require '../partials/connect.php';
$sellerModel = new SellerModel($pdo);


    if(!empty(($_POST['firstname']) &&  ($_POST['lastname']) && ($_POST['email']))) {
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_SPECIAL_CHARS);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    
        $sellerModel->addSeller($firstname, $lastname, $email);
    
    }

        header("Location: ../sellers.php");

?>