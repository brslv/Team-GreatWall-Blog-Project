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
			$this->getView('admin/adminPanelView');
		} else {
			Redirect::to('homepage');
		}
	}
}
