<?php

require_once '../classes/seller/seller-model.php';

$pdo = require'../partials/connect.php';
$sellerModel = new SellerModel($pdo);

$firstname = ""; 
$firstnameErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["firstname"])) {
        $firstnameErr = "Förnamn måste anges";
    } else {
        $firstname = test_input($_POST["firstname"]);
    }
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

    if(isset($_POST['firstname'], $_POST['lastname'], $_POST['email'])) {
        $firstname = filter_var($_POST['firstname'], FILTER_SANITIZE_SPECIAL_CHARS);
        $lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    
        
           echo "<p>$firstname_error</p>";
    
        $sellerModel->addSeller($firstname, $lastname, $email);
    
    }



header("Location: ../sellers.php");

?>