<?php

require_once 'product.php';

class ProductView {

    public function renderSellButton(): void {

    }

    public function renderProductForTable(ProductCollection $pc): void {
        echo "
        <table>
        <thead>
            <tr>
                <th>Märke</th>
                <th style='width:300px'>Beskrivning</th>
                <th>Typ</th>
                <th>Storlek</th>
                <th>Säljare</th>
                <th>Pris</th>
              
            </tr>
        </thead>
        <tbody>";
        foreach($pc->getAllProducts() as $product) {
            $checkedIfSold = $product->getIsSold();
            $productId = $product->getId();

            echo "
            <tr>
                <td>{$product->getBrand()}</td>
                <td>{$product->getDescription()}</td>
                <td>{$product->getType()}</td>
                <td>{$product->getSize()}</td>
                <td>{$product->getSeller()}</td>
                <td>{$product->getPrice()} kr</td>

                <td> "; 
                   echo  
                   "<form action='form-handlers/buy_product-form-handler.php' method='POST'>";
                   echo "<input type='hidden' name='prod_id_{$product->getId()}' value='{$product->getId()}' />";
                   //echo $productId;
                   echo $checkedIfSold == 1 ? "<button class='sell-btn is_sold-btn' type='submit'>Såld</>" : "<button class='sell-btn'>Sälja</button>";
                   echo "</form>
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


// <td>";
// echo $checkedIfSold == 1 ? 'Yes' : 'No';

// echo " 
// </td>

// <th>Sålt</th>
//<?php echo $page == "products.php"? 'active' : '' 
// <input name='checkedIfSold' type='checkbox'";  if ($checkedIfSold == 1) echo " checked='checked'>