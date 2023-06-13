<?php 

require_once(__DIR__.'/../db.php');

class TypeModel extends DB {

    protected $table = "product_types";

    public function getAllTypes() {
        return $this->getAll($this->table);
    }

    public function getAllTypesInOrder() {
        $sql = 
        "SELECT product_type_name FROM product_types
        ORDER BY product_type_name ASC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}