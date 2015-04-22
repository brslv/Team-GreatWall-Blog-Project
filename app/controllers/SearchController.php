<?php

/**
 * SearchController
 */
class Search extends Main {

	public function index() {
		Redirect::to('homepage');
	}

	/**
	 * Fetches all the posts, containing the specified tag
	 * 
	 * @param  string $tagName
	 */
	public function tag($tagName = null) {
		if($tagName == null) {
			Redirect::to('homepage');
		}

		$tagName = trim(htmlspecialchars($tagName[0]));

		$tagModel = $this->getModel('TagModel');
		$posts = $tagModel->getPostsWithTag($tagName);
		$posts = !empty($posts) ? $posts : null;

		$data = [
			'searchTerm' => $tagName,
			'results' => $posts,
		];

		$this->getView('searchView', $data);
	}

	public function post() {
		///////////////////////
		// TODO: Implement //
		///////////////////////
		
		
	}

	public function all() {
		///////////////////////
		// TODO: Implement //
		///////////////////////
	}
}