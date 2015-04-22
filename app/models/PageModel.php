<?php

/**
 * PageModel
 */
class PageModel extends MainModel {

	/**
	 * Gets the information about the page, specified by id, from the Database
	 *
	 * @param  int $id The id of the page
	 * @return array
	 */
	public function open($id) {
		if (!empty($id)) {
			$query = $this->db->prepare('SELECT * FROM pages WHERE id=:id');
			$query->execute([':id' => $id]);
			return $query->fetchAll(PDO::FETCH_OBJ);
		}
	}
}