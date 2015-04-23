<?php

class CategoryModel extends MainModel{

    public function getCategories(){
        $query = 'SELECT * FROM categories';
        $stmt = $this->db->query($query);
        $stmt = $stmt->fetchAll(PDO::FETCH_OBJ);

        return  $stmt;
    }

    public function getCategoryIdByName($catName){
        $catName = trim(htmlspecialchars($catName));
        $query = 'SELECT id FROM categories WHERE title=:catName';
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':catName' => $catName
        ]);
        $catId = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $catId[0]->id;

    }

}