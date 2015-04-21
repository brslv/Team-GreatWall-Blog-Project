<?php

/**
 * PostModel class.
 */
class PostModel extends MainModel
{

    /**
     * Adds new post to the database.
     *
     * @return boolean
     */
    public function addPost()
    {

        if (!empty($_POST['postTitle']) && !empty($_POST['postContent'])) {

            $insertInfo = $this->db->prepare('INSERT INTO posts(title, content, excerpt,author_id, publish_date, status) VALUE (:postTitle, :postContent, :postExcerpt,:postAuthorId, :postDate, :status)');

            return $insertInfo->execute([
                ':postTitle' => filter_input(INPUT_POST, 'postTitle'),
                ':postContent' => filter_input(INPUT_POST, 'postContent'),
                ':postExcerpt' => trim(substr(filter_input(INPUT_POST, 'postContent'), 0, 500)) . "...",
                ':postAuthorId' => $_SESSION['id'],
                ':postDate' => date('Y-m-d'),
                ':status' => (int)$_POST['postVisibility']
            ]);

        }

        return false;

    }

    public function getPosts()
    {
        $query = 'SELECT posts.id, posts.title, posts.content, posts.excerpt, posts.publish_date, posts.status, users.username as author_username, users.firstname as author_firstname, users.lastname as author_lastname, categories.title as category';
        $query .= ' FROM posts';
        $query .= ' INNER JOIN users ON posts.author_id = users.id';
        $query .= ' INNER JOIN categories ON posts.category_id = categories.id';
        $query .= ' WHERE posts.status = 1';
        $query .= ' ORDER BY posts.id DESC';

        $allVisiblePosts = $this->db->query($query);
        $fetchedPosts = $allVisiblePosts->fetchAll(PDO::FETCH_ASSOC);
        return $fetchedPosts;
    }

    public function getPostByid($id)
    {
        // TODO: add AND status = 1!!!!!!!!!!!
        $query = $this->db->prepare('SELECT * FROM posts WHERE id=:id');
        $query->execute([':id' => $id]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result ? $result : false;
    }

}
