<?php

/**
 * HomeController.
 */
class Home extends Main {

	/**
	 * The default method.
	 *
	 */
	public function index() {
		if(isset($_POST['searchBar'])) {
			Redirect::to('search/master/?term=' . rawurlencode(rawurlencode($_POST['searchBar'])));
		}

		$home = $this->getModel('PostModel');
		$allVisiblePosts = $home->getPosts();
		$this->getView('homeView', $allVisiblePosts);
	}
}
