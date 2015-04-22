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
		if ($id == null) {
			Redirect::to('homepage');
		} else {
			$tag = $this->getModel('TagModel');
			$post = $this->getModel('PostModel');

			$post = $post->getPostById($id[0]);
			if (!$post) {
				Redirect::to('homepage');
			}

			$tags = $tag->get($post[0]['id']);

			$data = [
				'post' => $post,
				'tags' => $tags
			];

			$this->getView('singleView', $data);
		}
	}

}
