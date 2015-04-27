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

    public function getById($id) {
        $stmt = $this->db->prepare('SELECT * FROM categories WHERE id = :id');
        $stmt->execute([':id'=>$id]);
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function add() {
        if(!empty(!empty($_POST['categoryTitle']))) {
            $stmt = $this->db->prepare('INSERT INTO categories(title) VALUES(:title)');
            return $stmt->execute([
                ':title' => $_POST['categoryTitle'],
            ]);
        }
    }
    public function delete($categoryId){
        if(isset($_SESSION['role'])) {
            if($_SESSION['role'] == 'admin') {
                $stmt = $this->db->prepare("DELETE FROM categories WHERE id = :categoryid");
                return $stmt->execute([
                    ':categoryid' => $categoryId,
                ]);
            }
        }
    }

    public function update($categoryId) {
        $newTitle = $_POST['newTitle'];

        $stmt = $this->db->prepare('UPDATE categories SET title = :title WHERE id = :category_id');
        return $stmt->execute([
            ':title' => $newTitle,
            ':category_id' => $categoryId
        ]);
    }
}