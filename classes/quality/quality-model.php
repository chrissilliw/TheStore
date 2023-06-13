<?php 

require_once(__DIR__.'/../db.php');
require_once('quality.php');
require_once('quality-collection.php');

class QualityModel extends DB {

    protected $table = "product_quality";

    public function getAllTypes() {
        return $this->getAll($this->table);
    }

    public function getAllQualityInOrder() {
        $sql = 
        "SELECT product_quality.product_quality_id, product_quality.product_quality_name FROM product_quality
        ORDER BY product_quality.product_quality_name DESC";
        $statement = $this->pdo->prepare($sql);
        $statement->execute();
        $allQualities = $statement->fetchAll(PDO::FETCH_ASSOC);
        $QualityCollection = new QualityCollection();
        foreach($allQualities as $quality) {
            $newQuality = new Quality($quality['product_quality_id'], $quality['product_quality_name']);
            $QualityCollection->addQuality($newQuality);
        }
        print_r($QualityCollection);
        return $QualityCollection;
    }
}