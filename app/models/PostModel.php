<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PostModel
 *
 * @author brslv
 */
class PostModel extends Db {
    protected $db;

    public function __construct() {

            $this->db = new Db();



    }
    public function addPost(){

        if(!empty($_POST['postTitle']) && !empty($_POST['postContent'])) {
            $insertInfo = $this->db->prepare('INSERT INTO posts(title,content) VALUE (:postTitle,:postContent)');
            return $insertInfo->execute([
                ':postTitle' => $_POST['postTitle'],
                ':postContent' => $_POST['postContent']
            ]);

        }

        return false;

    }

}
