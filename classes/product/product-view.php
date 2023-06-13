<?php

require_once 'product.php';

class ProductView {

    // public function renderAllProductsAsList(ProductCollection $products): void {
    //     echo "<ul>";
    //     foreach($products->getAllProducts() as $product) {
    //         echo "<li class='product-item'> 
    //                 <p>
    //                     <span>Produktnamn:</span> {$product->getName()}
    //                 </p>
    //                 <p>
    //                     <span>Beskrivning:</span> {$product->getDescription()}
    //                 </p>   
    //                 <p>
    //                    <span>Märke:</span> {$product->getBrand()}
    //                 </p>
    //                 <p>
    //                     <span>Typ:</span> {$product->getType()}
    //                 </p>
    //                 <p>
    //                     <span>Storlek:</span> {$product->getSize()}
    //                 </p>
    //                 <p>
    //                     <span>Färg:</span> {$product->getColor()}
    //                 </p>
    //                 <p>
    //                     <span>Skick:</span> {$product->getQuality()}
    //                 </p>
    //             </li>";
    //     }
    //     echo "</ul>";
    // }

    public function renderProductForTable(ProductCollection $pc): void {
        echo "
        <table>
        <thead>
            <tr>
                <th>Namn</th>
                <th>Beskrivning</th>
                <th>Märke</th>
                <th>Typ</th>
                <th>Storlek</th>
                <th>Färg</th>
                <th>Kvalitet</th>
                <th>Pris</th>
            </tr>
        </thead>
        <tbody>";
        foreach($pc->getAllProducts() as $product) {
            echo "
            <tr>
                <td>{$product->getName()}</td>
                <td>{$product->getDescription()}</td>
                <td>{$product->getBrand()}</td>
                <td>{$product->getType()}</td>
                <td>{$product->getSize()}</td>
                <td>{$product->getColor()}</td>
                <td>{$product->getQuality()}</td>
                <td>{$product->getPrice()}</td>
            </tr>
            ";
        }
    }

}