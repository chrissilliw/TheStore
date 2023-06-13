<?php 

require_once(__DIR__.'/../db.php');

class ColorModel extends DB {

    protected $table = "product_colors";

    public function getAllSizes() {
        return $this->getAll($this->table);
    }

    public function getAllColorsInOrder() {
        $sql = 
        "SELECT product_color_name FROM product_colors
        ORDER BY product_color_name ASC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}