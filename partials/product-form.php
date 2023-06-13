<?php
    require_once 'classes/product/product-view.php';
    require_once 'classes/product/product-model.php';
    require_once 'classes/type/type-model.php';
    require_once 'classes/brand/brand-model.php';
    require_once 'classes/size/size-model.php';

    $ProductModel = new ProductModel($pdo);
    $TypeModel = new TypeModel($pdo);
    $BrandModel = new BrandModel($pdo);
    $SizeModel = new SizeModel($pdo);
?>

<form action="product-form-handler.php" method="post" class="form-wrapper">
<h3>Lägg till ny produkt</h3>
<div class="inputs">
    <div class="input-section">
        <div class="input-wrapper">
            <label for="name" class="input-label">Namn<pre>*</pre></label>
            <input type="text" name="prod_name" id="prod_name" placeholder="Produktnamn">
        </div>
        <div class="input-wrapper">
            <label for="desc" class="input-label">Beskrivning<pre>*</pre></label>
            <textarea type="text" name="prod_desc" id="prod_desc" placeholder="Beskrivning">
            </textarea>
        </div>
        <div class="input-wrapper">
            <label for="brand" class="input-label">Märke<pre>*</pre></label>
            <select name="brand_id" class="select-search" id="select_brand_id" data-live-search="true">
                <option value="">Välj Märke</option>
                <?php
                    $brands = $BrandModel->getAllBrandsInOrder();
                    foreach($brands as $brand) {
                        echo "<option value='{$brand['product_brand_id']}'>
                            {$brand['product_brand_name']}
                        </option>";
                    }
                ?>
            </select>
        </div>
        <div class="input-wrapper">
            <label for="type" class="input-label">Typ<pre>*</pre></label>
            <select name="type_id" class="select-search" id="type_id" data-live-search="true">
                <option value="">Välj Typ</option>
                <?php
                    $types = $TypeModel->getAllTypesInOrder();
                    foreach($types as $type) {
                        echo "<option value='{$type['product_type_id']}'>
                            {$type['product_type_name']}
                        </option>";
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="input-section">
        <div class="input-wrapper">
            <label for="size" class="input-label">Storlek<pre>*</pre></label>
            <select name="size_id" class="select-search" id="size_id" data-live-search="true">
                <option value="">Välj Storlek</option>
                <?php
                    $sizes = $SizeModel->getAllSizesInOrder();
                    foreach($sizes as $size) {
                        echo "<option value='{$size['product_size_id']}'>
                            {$size['product_size_name']}
                        </option>";
                    }
                ?>
            </select>
        </div>
        <div class="input-wrapper">
            <label for="color" class="input-label">Färg<pre>*</pre></label>
            <input type="text" name="prod_color" id="prod_color" placeholder="Färg">
        </div>
        <div class="input-wrapper">
            <label for="quality" class="input-label">Kvalitet<pre>*</pre></label>
            <input type="text" name="prod_quality" id="prod_quality" placeholder="Kvalitet">
        </div>
        <div class="input-wrapper">
            <label for="price" class="input-label">Pris<pre>*</pre></label>
            <input type="text" name="prod_pris" id="prod_pris" placeholder="Pris">
        </div>
    </div>
</div>
<button type="submit" class="submit-button">Lägg till produkt</button>
</form>