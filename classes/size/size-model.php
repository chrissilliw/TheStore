<?php 

require_once(__DIR__.'/../db.php');

class SizeModel extends DB {

    protected $table = "product_sizes";

    public function getAllSizes() {
        return $this->getAll($this->table);
    }

    public function getAllSizesInOrder() {
        $sql = 
        "SELECT product_size_name FROM product_sizes
        ORDER BY product_size_name ASC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}