<?php

class PageModel extends MainModel {

    public function goToPage($id) {
        //if (!empty($id)){
            $query = $this->db->prepare('SELECT * fROM pages WHERE id=:id');
            $query->execute([':id'=>$id]);
            return  $query->fetchAll(PDO::FETCH_OBJ);

        //}
    }
}