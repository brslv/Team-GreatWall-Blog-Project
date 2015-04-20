<?php

/**
 * PostModel class.
 */
class PostModel extends MainModel {

    /**
     * Adds new post to the database.
     * 
     * @return boolean
     */
    public function addPost(){

        if(!empty($_POST['postTitle']) && !empty($_POST['postContent'])) {
            $insertInfo = $this->db->prepare('INSERT INTO posts(title,content,excerpt,publish_date) VALUE (:postTitle,:postContent,:postExcerpt,:postDate)');
            return $insertInfo->execute([
                ':postTitle' => $_POST['postTitle'],
                ':postContent' => $_POST['postContent'],
                ':postExcerpt' => trim(substr($_POST['postContent'], 0, 100))."...",
                ':postDate' => date('Y-m-d')
            ]);

        }

        return false;

    }

}
