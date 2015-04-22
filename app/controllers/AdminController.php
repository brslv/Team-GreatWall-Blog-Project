<?php

/**
 * AdminController
 */
class Admin extends Main {

	/**
	 * The default method.
	 *
	 */
	public function index() {
		$user = $this->getModel('UserModel');

		if ($user->isAdmin()) {
			Redirect::to('admin/addPost');
		} else {
			Redirect::to('homepage');
		}

	}

	/**
	 * Loads the adminView
	 * Sends information to the adminView on which admin sub-view to load
	 * In this case the sub-view is addPostView
	 *
	 */
	public function addPost() {
		if (!$this->getModel('UserModel')->isAdmin()) {
			Redirect::to('homepage');
		}

		$msg = null;
		$viewData = null;

		if (isset($_POST['postSubmit'])) {
			$post = $this->getModel('PostModel');

			$result = $post->addPost();

			if ($result) {
				$msg = 'Post added successfully.';
			} else {
				$msg = 'Don\'t cheat, bro! Fill in all the blanks.';
			}
		}

		$data = [
			'msg' => $msg,
			'action' => 'addPost',
		];

		$this->getView('adminView', $data);
	}

	/**
	 * Loads the admin panel and specifies the sub-view in the views/admin folder.
	 *
	 * @param  string $thing The thing the admin wants to manage (e.g. posts, pages or categories)
	 */
	public function manage($thing) {
		if (!$this->getModel('UserModel')->isAdmin()) {
			Redirect::to('homepage');
		}

		if (empty($thing)) {
			$this->index();
		} else if ($thing[0] == 'posts') {
			$data = [
				'msg' => null,
				'action' => 'managePosts',
			];

			$this->getView('adminView', $data);
		} else if ($thing[0] == 'pages') {
			$data = [
				'msg' => null,
				'action' => 'managePages',
			];

			$this->getView('adminView', $data);
		} else if ($thing[0] == 'categories') {
			$data = [
				'msg' => null,
				'action' => 'manageCategories',
			];

			$this->getView('adminView', $data);
		}
	}

}
