<?php

require_once 'classes/seller/seller-view.php';

require_once 'classes/db.php';
require_once 'classes/seller/seller-model.php';

$pdo = require 'partials/connect.php';

$db = new DB($pdo);
$sellerModel = new SellerModel($pdo);
$sellerView = new SellerView();

$sellers = $sellerModel->getAllTheSellers();
//$sellerView->renderSellerForTable($sellers);


?>

<main>
            <h1>Hem</h1>

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
                <!-- <table>
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Förnamn</th>
                            <th>Efternamn</th>
                            <th>E-postadress</th>
                        </tr>
                    </thead> -->
                    <?php $sellerView->renderSellerForTable($sellers); ?>
                    <!-- <tbody>
                        <tr>
                            <td>*bild*</th>
                            <td>Luke</th>
                            <td>Skywalker</th>
                            <td>luke.skywalker@starwars.com</th>
                        </tr>
                        <tr>
                            <td>*bild*</th>
                            <td>Luke</th>
                            <td>Skywalker</th>
                            <td>luke.skywalker@starwars.com</th>
                        </tr>
                        <tr>
                            <td>*bild*</th>
                            <td>Luke</th>
                            <td>Skywalker</th>
                            <td>luke.skywalker@starwars.com</th>
                        </tr>
                        <tr>
                            <td>*bild*</th>
                            <td>Luke</th>
                            <td>Skywalker</th>
                            <td>luke.skywalker@starwars.com</th>
                        </tr>
                        <tr>
                            <td>*bild*</th>
                            <td>Luke</th>
                            <td>Skywalker</th>
                            <td>luke.skywalker@starwars.com</th>
                        </tr>
                    </tbody> 

                    </table>-->
            </section>
        </main>