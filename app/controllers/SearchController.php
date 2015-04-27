<?php

/**
 * SearchController
 */
class Search extends Main {

	/**
	 * The default method
	 * 
	 */
	public function index() {
		Redirect::to('homepage');
	}

	/**
	 * Fetches all the posts, containing the specified tag
	 * 
	 * @param  string $tagName
	 */
	public function tag() {
		if(isset($_GET['name']) && !empty(trim($_GET['name']))) {
			$name = rawurlencode($_GET['name']);
		} else {
			Redirect::to('homepage');
		}

		$tagName = trim(rawurldecode($name));

		$searchModel = $this->getModel('SearchModel');
		$posts = $searchModel->searchByTag(rawurldecode($tagName));
		$posts = !empty($posts) ? $posts : null;

		$data = [
			'searchTerm' => rawurldecode($tagName),
			'results' => $posts,
		];

		$this->getView('searchView', $data);
	}

	/**
	 * Searches by category
	 * 
	 */
    public function category(){
        if(isset($_GET['name']) && !empty(trim($_GET['name']))) {
            $name = rawurldecode($_GET['name']);
        } else {
            Redirect::to('homepage');
        }

        $catName = trim(rawurldecode($name));
        $catId = $this->getModel('CategoryModel')->getCategoryIdByName($catName);
        $searchModel = $this->getModel('SearchModel');
        $posts = $searchModel->searchByCategory(rawurldecode($catName));
        $posts = !empty($posts) ? $posts : null;

        $data = [
            'searchTerm' => rawurldecode($catName),
            'results' => $posts,
        ];

        $this->getView('searchView', $data);
    }

    /**
     * Retrieves all posts on published this date
     * 
     * @return string In a valid date format (YYYY-MM-DD)
     */
	public function ondate() {
		if(isset($_GET['d']) && !empty(trim($_GET['d']))) {
            $ondate = rawurldecode($_GET['d']);
        } else {
            Redirect::to('homepage');
        }

        $ondate = trim(rawurldecode($ondate));
        $posts = $this->getModel('SearchModel')->searchByDate(rawurldecode($ondate));
        $posts = !empty($posts) ? $posts : null;

        $data = [
            'searchTerm' => rawurldecode($ondate),
            'results' => $posts,
        ];

        $this->getView('searchView', $data);
	}

	/**
	 * Performs a search action, searching in posts titles, contents and tags.
	 * 
	 * @param  string $term The searched term
	 */
	public function master() {
		if(isset($_GET['term']) && !empty(trim($_GET['term']))) {
			$term = rawurldecode($_GET['term']);
		} else {
			Redirect::to('homepage');
		}

		$results = [];
		
		$searchModel = $this->getModel('SearchModel');

		// Get all the posts, containing the searched term
		$posts = $searchModel->post(rawurldecode($term));
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