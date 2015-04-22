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

		$searchModel = $this->getModel('SearchModel');
		$posts = $searchModel->searchByTag($tagName);
		$posts = !empty($posts) ? $posts : null;

		$data = [
			'searchTerm' => $tagName,
			'results' => $posts,
		];

		$this->getView('searchView', $data);
	}

	/**
	 * Performs a search action, searching in posts titles, contents and tags.
	 * 
	 * @param  string $term The searched term
	 */
	public function master($term) {
		$term = trim(htmlspecialchars($term[0]));

		$results = [];
		
		$searchModel = $this->getModel('SearchModel');

		// Get all the posts, containing the searched term
		$posts = $searchModel->post($term);
		$addToResults = true;
		if(!empty($posts)) {
			foreach ($posts as $p) {
				if(!in_array($p, $results)) {
					$results[] = $p;
				}
			}
		}

		// Get all the posts, containing tags, such as the searched term
		$posts = $searchModel->searchByTag($term);
		if(!empty($posts)) {
			foreach ($posts as $p) {
				foreach ($results as $r) {
					if($p->id == $r->id) {
						$addToResults = false;
					}
				}

				if($addToResults) {
					$results[] = $p;
				}
			}
		}

		$data = [
			'searchTerm' => $term,
			'results' => $results
		];

		$this->getView('searchView', $data);
	}
}