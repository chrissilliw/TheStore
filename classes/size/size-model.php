<?php 

require_once(__DIR__.'/../db.php');
require_once 'size.php';
require_once 'size-collection.php';

class SizeModel extends DB {

    protected $table = "product_sizes";

    public function getAllSizes() {
        return $this->getAll($this->table);
    }

    public function getAllSizesInOrder() {
        $sql = 
        "SELECT product_sizes.product_size_id, product_sizes.product_size_name FROM product_sizes
        ORDER BY product_size_name ASC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $allSizes = $statement->fetchAll(PDO::FETCH_ASSOC);
        $SizeCollection = new SizeCollection();
        foreach($allSizes as $size) {
            $newSize = new Size($size['product_size_id'], $size['product_size_name']);
            $SizeCollection->addSize($newSize);
        }
        return $SizeCollection;
    }
}