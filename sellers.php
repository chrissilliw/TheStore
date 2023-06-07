<?php

    require 'classes/seller/seller-view.php';
    require 'classes/seller/seller-model.php';
    require 'classes/seller/seller-collection.php';

    $pdo = require 'partials/connect.php';

    $SellerModel = new SellerModel($pdo);
    $SellerView = new SellerView($pdo);

    include 'partials/header.php';
    include 'partials/menu.php';

?>

<div class="content">

<h2 class="page-title">Säljare</h2>

<main class="main-content">

    <?php

        include 'partials/seller-form.php';
    ?>

    <section class="all_sellers_list">

    <h3 class="form-title">Alla säljare</h3>

    <?php
        $SellerView->renderAllTheSellers($SellerModel->getAllTheSellers());
    ?>
    </section>

    <section class="seller_info">

        <?php

            if(isset($_GET['id'])) {
                $id = (int) filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
                var_dump($id);
                $single_seller = $SellerModel->getSeller($id);

                var_dump($single_seller);
                $SellerView->renderSellerInfo($single_seller);
            }

        ?>

    </section>

</main>

</div>

<?php
include 'partials/footer.php';