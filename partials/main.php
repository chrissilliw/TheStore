<?php

require_once 'classes/seller/seller-view.php';

require_once 'classes/db.php';
require_once 'classes/seller/seller-model.php';

$pdo = require 'partials/connect.php';

$db = new DB($pdo);
$sellerModel = new SellerModel($pdo);
$sellerView = new SellerView();

$sellers = $sellerModel->getAllTheSellers();

?>

<main>
    <section class="section-top">
        <div class="white-card">
            <h1>Hem</h1>
        </div>
    </section>

    <section class="section-third">
        <div class="sales white-card">
            <span class="material-symbols-sharp icon-span">payments</span>
            <h3>Försäljningar Totalt</h3>
            <h1>5.000 kr</h1>
        </div>
        <div class="garments white-card">
        <span class="material-symbols-sharp icon-span">group</span>
            <h3>Plagg Totalt</h3>
            <h1>120 st</h1>
        </div>
        <div class="garments white-card">
        <span class="material-symbols-sharp icon-span">group</span>
            <h3>Plagg Totalt</h3>
            <h1>120 st</h1>
        </div>
    </section>

    <section class="section-full">
        <h2>Lista över säljare</h2>

        <?php $sellerView->renderSellerForTable($sellers); ?>

    </section>
</main>