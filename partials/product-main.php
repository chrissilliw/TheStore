<?php

require_once 'classes/product/product-view.php';

require_once 'classes/product/product-model.php';

$pdo = require 'partials/connect.php';

$db = new DB($pdo);
$ProductModel = new ProductModel($pdo);
$ProductView = new ProductView();

$products = $ProductModel->getAllTheProducts();

?>


<main>
    <h1>Produkter</h1>

    <section class="section-half flip">
        <div class="sales white-card">
        <span class="material-symbols-sharp icon-span">laundry</span>

        <?php
            include 'partials/product-form.php';
        ?>
        </div>
    </section>

    <section class="section-half">

    </section>

    <section class="section-full">
        <div class="section-title-container">
            <span class="material-symbols-sharp icon-span">receipt_long</span>
            <h2 class="section-title">Lista över alla produkter</h2>
        </div>
            <?php $ProductView->renderProductForTable($products); ?>
    </section> 

</main>