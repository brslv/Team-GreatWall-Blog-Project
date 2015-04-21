<?php

/**
 * 
 * 
 * TODO: Abstract away the tagging engine in a separate class!!!!!!!!!
 * 
 * 
 */

/**
 * PostModel class.
 */
class PostModel extends MainModel
{

    /**
     * Adds new post to the database
     *
     * @return boolean
     */
    public function addPost()
    {

        if (!empty($_POST['postTitle']) && !empty($_POST['postContent'])) {

            $insertInfo = $this->db->prepare('INSERT INTO posts(title, content, excerpt, author_id, publish_date, status) VALUE (:postTitle, :postContent, :postExcerpt,:postAuthorId, :postDate, :status)');

            // return this
            $result = $insertInfo->execute([
                ':postTitle' => filter_input(INPUT_POST, 'postTitle'),
                ':postContent' => filter_input(INPUT_POST, 'postContent'),
                ':postExcerpt' => trim(substr(filter_input(INPUT_POST, 'postContent'), 0, 500)) . "...",
                ':postAuthorId' => $_SESSION['id'],
                ':postDate' => date('Y-m-d'),
                ':status' => (int)$_POST['postVisibility']
            ]);

            $insertedPostId = $this->db->lastInsertId();
            $tags = $this->parseTags();
            $tagIds = $this->addTags($tags);
            $this->addTaxonomy($insertedPostId, $tagIds);
            return $result;
        }

        return false;

    }

    /**
     * Adds given tags as array to the database
     * 
     * @var array $tags
     */
    private function addTags($tags) {
        $isertedTagsIds = [];

        if(isset($_POST['postTags'])){
            foreach ($tags as $tag){
                $tagId = $this->getTagId($tag);
                if($tagId == false) {
                    $query = $this->db->prepare("INSERT INTO tags (title) VALUES (:title)");
                    $query->execute([
                        ':title' => $tag
                    ]);
                    $insertedTagsids[] = $this->db->lastInsertId();
                } else {
                    $insertedTagsids[] = $tagId;
                }
            }
        }

        return $insertedTagsids;
    }

    /**
     * Parses tags string (separated by comma-space /, /)
     * 
     * @return boolean
     */
    private function parseTags() {
        if(isset($_POST['postTags'])) {
            return $tags = explode(", ", filter_input(INPUT_POST, 'postTags'));
        }

        return false;
    }

    /**
     * Adds new items to the taxonomy table. 
     * This method needs the id of the post and the tags id's as an array.
     * 
     * @var int $postId
     * @var array $tagIds
     */
    private function addTaxonomy($postId, $tagIds) {
        if(!empty($tagIds) && $postId) {
            foreach ($tagIds as $tag) {
                $query = 'INSERT INTO taxonomy(post_id, tag_id) VALUES(:post_id, :tag_id)';
                $_query = $this->db->prepare($query);
                $_query->execute([
                    ':post_id' => $postId,
                    ':tag_id' => $tag
                ]);
            }
        }

        return false;
    }

    /**
     * Get tag by id
     * 
     * @var string $tagName
     */
    private function getTagId($tagName) {
        $query = $this->db->prepare('SELECT * FROM tags WHERE title = :title');
        $query->execute([
            ':title' => $tagName
        ]);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return empty(!$result) ? $result[0]->id : false;
    }

    /**
     * 
     * @return array All posts
     */
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

    /**
     * Returns a post by given id
     * 
     * @return array
     */
    public function getPostByid($id)
    {
        // TODO: Limit by 1 and return $result[0] ?
        $query = 'SELECT posts.id, posts.title, posts.content, posts.excerpt, posts.publish_date, posts.status, users.username as author_username, users.firstname as author_firstname, users.lastname as author_lastname, categories.title as category';
        $query .= ' FROM posts';
        $query .= ' INNER JOIN users ON posts.author_id = users.id';
        $query .= ' INNER JOIN categories ON posts.category_id = categories.id';
        $query .= ' WHERE posts.status = 1 AND posts.id = :id';
        $query .= ' ORDER BY posts.id DESC';

        $query = $this->db->prepare($query);
        $query->execute([
            ':id' => $id,
        ]);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result ? $result : false;
    }

}
