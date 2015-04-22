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
		$home = $this->getModel('PostModel');
		$allVisiblePosts = $home->getPosts();
		$this->getView('homeView', $allVisiblePosts);
	}
}
