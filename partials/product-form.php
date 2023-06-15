<?php
    require_once 'classes/product/product-view.php';
    require_once 'classes/type/type-model.php';
    require_once 'classes/brand/brand-model.php';
    require_once 'classes/size/size-model.php';
    require_once 'classes/color/color-model.php';
    require_once 'classes/quality/quality-model.php';
    require_once 'classes/sellerId/sellerId-model.php';

    $BrandModel = new BrandModel($pdo);
    $TypeModel = new TypeModel($pdo);
    $SizeModel = new SizeModel($pdo);
    $ColorModel = new ColorModel($pdo);
    $QualityModel = new QualityModel($pdo);
    $SellerIdModel = new SellerIdModel($pdo);

    $allBrands = $BrandModel->getAllBrandsInOrder();
    $allTypes = $TypeModel->getAllTypesInOrder();
    $allSizes = $SizeModel->getAllSizesInOrder();
    $allColors = $ColorModel->getAllColorsInOrder();
    $allQualities = $QualityModel->getAllQualityInOrder();
    $allSellersId = $SellerIdModel->getAllSellersInOrder();

    $BrandCollection = new BrandCollection($pdo);
    $TypeCollection = new TypeCollection($pdo);
    $SizeCollection = new SizeCollection($pdo);
    $ColorCollection = new ColorCollection($pdo);
    $QualityCollection = new QualityCollection($pdo);
    $SellerIdCollection = new SellerIdCollection($pdo);
?>

<form action="form-handlers/product-form-handler.php" method="POST" class="form-wrapper">
<h3>Lägg till ny produkt</h3>
<div class="inputs">
    <div class="input-section">
        <div class="input-wrapper">
            <label for="name" class="input-label">Namn<pre> *</pre></label>
            <input type="text" name="prod_name" id="prod_name" placeholder="Produktnamn">
            <?php if(isset($name_error)) { ?>
                <p><?php echo $name_error; ?></p>
            <?php } ?>
        </div>
        <div class="input-wrapper">
            <label for="desc" class="input-label">Beskrivning<pre> *</pre></label>
            <textarea type="text" name="prod_desc" id="prod_desc" placeholder="Beskrivning"></textarea>
        </div>
        <div class="input-wrapper">
            <label for="brand" class="input-label">Märke<pre> *</pre></label>
            <select name="brand_id" class="select-search" id="select_brand_id" data-live-search="true">
                <option value="">Välj Märke</option>
                <?php
                    foreach($allBrands->getAllBrands() as $brand) {
                        echo "<option value='{$brand->getId()}'>
                            {$brand->getName()}
                        </option>";
                    }
                ?>
            </select>
        </div>
        <div class="input-wrapper">
            <label for="type" class="input-label">Typ<pre> *</pre></label>
            <select name="type_id" class="select-search" id="type_id" data-live-search="true">
                <option value="">Välj Typ</option>
                <?php
                    foreach($allTypes->getAllTypes() as $type) {
                        echo "<option value='{$type->getId()}'>
                            {$type->getName()}
                        </option>";
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="input-section">
        <div class="input-wrapper">
            <label for="size" class="input-label">Storlek<pre> *</pre></label>
            <select name="size_id" class="select-search" id="size_id" data-live-search="true">
                <option value="">Välj Storlek</option>
                <?php
                    foreach($allSizes->getAllSizes() as $size) {
                        echo "<option value='{$size->getId()}'>
                            {$size->getName()}
                        </option>";
                    }
                ?>
            </select>
        </div>
        <div class="input-wrapper">
            <label for="color" class="input-label">Färg<pre> *</pre></label>
            <select name="color_id" class="select-search" id="color_id" data-live-search="true">
                <option value="">Välj Färg</option>
                <?php
                    foreach($allColors->getAllColors() as $color) {
                        echo "<option value='{$color->getId()}'>
                            {$color->getName()}
                        </option>";
                    }
                ?>
            </select>
        </div>
        <div class="input-wrapper">
            <label for="quality" class="input-label">Kvalitet<pre> *</pre></label>
            <select name="quality_id" class="select-search" id="quality_id" data-live-search="true">
                <option value="">Välj Kvalitet</option>
                <?php
                    foreach($allQualities->getAllQualities() as $quality) {
                        echo "<option value='{$quality->getId()}'>
                            {$quality->getName()}
                        </option>";
                    }
                ?>
            </select>
        </div>

        <div class="input-wrapper">
            <label for="price" class="input-label">Pris<pre> *</pre></label>
            <input type="text" name="prod_price" id="prod_price" placeholder="Pris">
        </div>

        <div class="input-wrapper">
            <label for="seller" class="input-label">Säljare<pre> *</pre></label>
            <select name="seller_id" class="select-search" id="seller_id" data-live-search="true">
                <option value="">Välj Säljare</option>
                <?php
                    foreach($allSellersId->getAllSellerIds() as $sellerId) {
                        echo "<option value='{$sellerId->getId()}'>
                            {$sellerId->getFirstname()} {$sellerId->getLastname()}
                        </option>";
                    }
                ?>
            </select>
        </div>
    </div>
</div>
<button type="submit" class="submit-button">Lägg till produkt</button>
</form>