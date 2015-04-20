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
            
            $insertInfo = $this->db->prepare('INSERT INTO posts(title, content, excerpt, publish_date, status) VALUE (:postTitle, :postContent, :postExcerpt, :postDate, :status)');
            
            return $insertInfo->execute([
                ':postTitle' => filter_input(INPUT_POST, 'postTitle'),
                ':postContent' => filter_input(INPUT_POST, 'postTitle'),
                ':postExcerpt' => trim(substr(filter_input(INPUT_POST, 'postTitle'), 0, 100))."...",
                ':postDate' => date('Y-m-d'),
                ':status' => (int) $_POST['postVisibility']
            ]);

        }

        return false;

    }

    public function getPosts(){
        $allVisiblePosts = $this->db->query('SELECT * FROM posts WHERE status=1 ORDER BY id DESC');
        $fetchedPosts = $allVisiblePosts->fetchAll(PDO::FETCH_ASSOC);
        return $fetchedPosts;
    }

}
