<?php

/**
 * PageController
 */
class Page extends Main {

	/**
	 * The default method
	 *
	 */
	public function index() {
		Redirect::to('homepage');
	}

	/**
	 * Shows a specified page by id
	 *
	 * @param  int $id The id of the page
	 */
	public function show($id) {
		if (empty($id)) {
			Redirect::to('homepage');
		} else {
			$page = $this->getModel('PageModel');
			$page = $page->open($id[0]);
			$this->getView('pageView', $page);
		}

	}

	/**
	 * Manage page
	 * 
	 */
	public function manage() {
		$pageModel = $this->getModel('PageModel');
		$pages = $pageModel->getAll();
		$msg = null;

		if(isset($_POST['pageSubmit'])) {
			$msg = $pageModel->add();
			$msg = $msg ? 'Successfully added new page.' : 'Something went wrong. Please, try again.';
		}

		$data = [
			'msg' => $msg,
			'pages' => $pages
		];

		$this->getView('admin/managePagesView', $data);
	}

	/**
	 * Delete page
	 * 
	 * @param  int $id   
	 */
	public function delete($id) {
		if(!isset($_SESSION['role'])) {
			if($id == null || $_SESSION['role'] != 'admin') {
				Redirect::to('homepage');
			} 
		} else {
			$pageModel = $this->getModel('PageModel');
			$pageModel->delete($id[0]);
			Redirect::to('page/manage');
		}
	}

	/**
	 * Edit page
	 * 
	 * @param  int $pageId   
	 */
	public function edit($pageId) {
		$pageModel = $this->getModel('PageModel');
		if(!$this->getModel('UserModel')->isAdmin()) {
			Redirect::to('homepage');
		}

		if(empty($pageId)) Redirect::to('page/manage');
		else $pageId = $pageId[0];

		$oldPageVersion = $pageModel->open($pageId);
		$msg = null;
		if(isset($_POST['updatePageSubmit'])) {
			if(!empty($_POST['newTitle']) && !empty($_POST['newContent'])) {
				if($pageModel->update($pageId)) {
					$msg = 'Successfully updated page';
				} else {
					$msg = 'Something went wrong. Please try again.';
				}

			}
		}

		$data = [
			'oldVersion' => $oldPageVersion,
			'msg' => $msg,
		];

		$this->getView('admin/editPageView', $data);
	}
}