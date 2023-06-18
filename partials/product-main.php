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
    <section class="section-top">
        <div class="white-card">
            <h1>Produkter</h1>
        </div>
    </section>

    <section class="section-half flip">
        <div class="sales white-card">
            <span class="material-symbols-sharp icon-span">library_add</span>

            <?php
                include 'partials/product-form.php';
            ?>
        </div>
        <div class="garments white-card">
            <span class="material-symbols-sharp icon-span">laundry</span>
            <?php

                if(isset($_GET['ID'])) {
                    $id = (int)  filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

                   // $single_product = $ProductModel->
                }

            ?>
        </div>
    </section>



    <section class="section-full">
        <div class="section-title-container">
            <span class="material-symbols-sharp icon-span">receipt_long</span>
            <h2 class="section-title">Lista över alla produkter</h2>
        </div>
            <?php $ProductView->renderProductForTable($products); ?>
    </section> 

</main>