<?php 

require_once(__DIR__.'/../db.php');
require_once 'color.php';
require_once 'color-collection.php';

class ColorModel extends DB {

    protected $table = "product_colors";

    public function getAllColors() {
        return $this->getAll($this->table);
    }

    public function getAllColorsInOrder() {
        $sql = 
        "SELECT product_colors.product_color_id, product_colors.product_color_name FROM product_colors
        ORDER BY product_color_name ASC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $allColors = $statement->fetchAll(PDO::FETCH_ASSOC);
        $ColorCollection = new ColorCollection();
        foreach($allColors as $color) {
            $newColor = new Color($color['product_color_id'], $color['product_color_name']);
            $ColorCollection->addColor($newColor);
        }
        return $ColorCollection;
    }
}