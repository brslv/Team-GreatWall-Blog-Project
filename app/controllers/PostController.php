<?php

class Post extends Main {

	/**
	 * The default method
	 *
	 */
	public function index() {
		Redirect::to('homepage');
	}

	/**
	 * Shows a specified post by id
	 *
	 * @param  int $id The id of the post
	 */
	public function show($id = null) {
        $commentModel = $this->getModel('CommentModel');
        if (isset($_POST['commentSubmit']) && !empty($_POST['commentContent'])) {
            $comment = $_POST['commentContent'];
            $author_id = $_SESSION['id'];
            $post_id = $id[0];
            $commentModel->addComment($comment, $post_id, $author_id);
        }
       $comments = $commentModel->listComments($id[0]);
		$tag = $this->getModel('TagModel');
		$post = $this->getModel('PostModel');

		$post = $post->getPostById($id[0]);
		if (!$post) {
			Redirect::to('homepage');
		}

		$tags = $tag->get($post[0]['id']);

		$data = [
			'post' => $post,
			'tags' => $tags,
            'comments' => $comments
		];

		$this->getView('singleView', $data);
	}

}
