<?php

class ProductView {

    public function renderAllProductsAsList(array $products): void {
        echo "<ul>";
        foreach($products as $product) {
            echo "<li class='product-item'> 
                    <p>
                        <span>Produktnamn:</span> {$product['prod_name']}
                    </p>
                    <p>
                        <span>Beskrivning:</span> {$product['prod_description']}
                    </p>   
                    <p>
                       <span>Märke:</span> {$product['product_brand_name']}
                    </p>
                    <p>
                        <span>Typ:</span> {$product['product_type_name']}
                    </p>
                    <p>
                        <span>Storlek:</span> {$product['product_size_name']}
                    </p>
                    <p>
                        <span>Färg:</span> {$product['product_color_name']}
                    </p>
                    <p>
                        <span>Skick:</span> {$product['product_quality_name']}
                    </p>
                </li>";
        }
        echo "</ul>";
    }

}