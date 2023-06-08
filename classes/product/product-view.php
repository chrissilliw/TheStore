<?php

require_once 'product.php';

class ProductView {

    public function renderAllProductsAsList(ProductCollection $products): void {
        echo "<ul>";
        foreach($products as $product) {
            echo "<li class='product-item'> 
                    <p>
                        <span>Produktnamn:</span> {$product->getName()}
                    </p>
                    <p>
                        <span>Beskrivning:</span> {$product->getDescription()}
                    </p>   
                    <p>
                       <span>Märke:</span> {$product->getBrand()}
                    </p>
                    <p>
                        <span>Typ:</span> {$product->getType()}
                    </p>
                    <p>
                        <span>Storlek:</span> {$product->getSize()}
                    </p>
                    <p>
                        <span>Färg:</span> {$product->getColor()}
                    </p>
                    <p>
                        <span>Skick:</span> {$product->getQuality()}
                    </p>
                </li>";
        }
        echo "</ul>";
    }

}