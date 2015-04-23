<?php
class CommentModel extends MainModel {
    //list comments
    //delete comments ?

    public function addComment($content, $post_id, $author_id) {
        $query = $this->db->prepare('INSERT INTO comments(content, post_id, author_id) VALUES (:content, :post_id, :author_id)');
        $query->execute([':content'=> $content, ':post_id'=> $post_id, ':author_id'=> $author_id]);
    }

    public function listComments($post_id){
        $query = $this->db->prepare("SELECT * FROM comments WHERE post_id=:post_id");
        $query->execute(['post_id'=> $post_id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}

