<?php

require_once 'product.php';

class ProductView {

    public function renderProductForTable(ProductCollection $pc): void {
        echo "
        <table>
        <thead>
            <tr>
                <th>Märke</th>
                <th style='width:300px'>Beskrivning</th>
                <th>Typ</th>
                <th>Storlek</th>
                <th>Färg</th>
                <th>Pris</th>
                <th>Sålt</th>
            </tr>
        </thead>
        <tbody>";
        foreach($pc->getAllProducts() as $product) {
            $checkedIfSold = $product->getIsSold();
            // var_dump($checkedIfSold);
            echo "
            <tr>
                <td>{$product->getBrand()}</td>
                <td>{$product->getDescription()}</td>
                <td>{$product->getType()}</td>
                <td>{$product->getSize()}</td>
                <td>{$product->getColor()}</td>
                <td>{$product->getPrice()}</td>
                <td>
                    <input name='checkedIfSold' type='checkbox'";  if ($checkedIfSold == 1) echo " checked='checked'>
                </td>

            </tr>
            ";
        }
            echo "
            </tbody>
            </table>
            ";
    }

}
//        <input name='checkedIfSold' type='checkbox'"; if ($checkedIfSold == 1) echo " checked='checked'/>
