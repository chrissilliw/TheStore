<?php 

require_once(__DIR__.'/../db.php');
require_once 'type.php';
require_once 'type-collection.php';

class TypeModel extends DB {

    protected $table = "product_types";

    public function getAllTypes() {
        return $this->getAll($this->table);
    }

    public function getAllTypesInOrder() {
        $sql = 
        "SELECT product_types.product_type_id, product_types.product_type_name FROM product_types
        ORDER BY product_type_name ASC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $allTypes = $statement->fetchAll(PDO::FETCH_ASSOC);
        $TypeCollection = new TypeCollection();
        foreach($allTypes as $type) {
            $newType = new Type($type['product_type_id'], $type['product_type_name']);
            $TypeCollection->addType($newType);
        }
        return $TypeCollection;
    }
}