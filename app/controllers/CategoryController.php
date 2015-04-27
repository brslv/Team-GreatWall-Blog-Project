<?php

/**
* CategoryController
*/
class Category extends Main
{
	
	public function manage() {
		$categoryModel = $this->getModel('CategoryModel');
		$categories = $categoryModel->getCategories();
		$msg = null;

        if(isset($_POST['categorySubmit'])) {
            $msg = $categoryModel->add();
            $msg = $msg ? 'Successfully added new category.' : 'Something went wrong. Please, try again.';

        }

        $data = [
			'msg' => $msg,
            'categories' => $categories
		];

		$this->getView('admin/manageCategoriesView', $data);
	}

	public function delete($id) {
		if(!isset($_SESSION['role'])) {
			if($id == null || $_SESSION['role'] != 'admin') {
				Redirect::to('homepage');
			} 
		} else {
			$categoryModel = $this->getModel('CategoryModel');
			$categoryModel->delete($id[0]);
			Redirect::to('category/manage');
		}
	}

	public function edit($categoryId) {
		$categoryModel = $this->getModel('CategoryModel');
		if(!$this->getModel('UserModel')->isAdmin()) {
			Redirect::to('homepage');
		}

		if(empty($categoryId)) Redirect::to('category/manage');
		else $categoryId = $categoryId[0];

		$oldCategoryVersion = $categoryModel->getById($categoryId);
		$msg = null;
		if(isset($_POST['updateCategorySubmit'])) {
			if(!empty($_POST['newTitle'])) {
				if($categoryModel->update($categoryId)) {
					$msg = 'Successfully updated category';
				} else {
					$msg = 'Something went wrong. Please try again.';
				}

			}
		}

		$data = [
			'oldVersion' => $oldCategoryVersion,
			'msg' => $msg,
		];

		$this->getView('admin/editCategoryView', $data);
	}

}