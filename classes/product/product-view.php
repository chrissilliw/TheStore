<?php

class ProductView {

    public function renderAllProductsAsList(array $products): void {
        echo "<ul>";
        foreach($products as $product) {
            echo "<li> 
                    <p>
                        Produktnamn: {$product['prod_name']}
                    </p>
                    <p>
                        Beskrivning: {$product['prod_description']}
                    </p>   
                    <p>
                        Märke: {$product['product_brand_name']}
                    </p>
                    <p>
                        Typ: {$product['product_type_name']}
                    </p>
                    <p>
                        Storlek: {$product['product_size_name']}
                    </p>
                    <p>
                        Färg: {$product['product_color_name']}
                    </p>
                    <p>
                        Skick: {$product['product_quality_name']}
                    </p>
                </li>";
        }
        echo "</ul>";
    }

}