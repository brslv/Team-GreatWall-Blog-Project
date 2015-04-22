<?php

class SearchModel extends MainModel {

	///////////////////////
	//Fix the searching //
	///////////////////////
	public function post($term) {
		$term = preg_replace("/[^0-9A-Za-z]/i", "", $term);
		// SELECT * FROM posts WHERE content LIKE '%more%' OR title LIKE '%more%'
		$query = "SELECT * FROM posts WHERE content LIKE concat('%', :content, '%') OR title LIKE concat('%', :title, '%')";
		
		$stmt = $this->db->prepare($query);
		$stmt->execute([
			':content' => $term,
			':title' => $term
		]);
		$results = $stmt->fetchAll(PDO::FETCH_OBJ);
		// var_dump($results);
		// die();
		return !empty($results) ? $results : null;
	}

	/**
	 * Returns a list of posts, containing the tag specified.
	 * 
	 * @param  string $tagName
	 * @return array
	 */
	public function searchByTag($tagName)
	{
		$tagName = trim(htmlspecialchars($tagName));
		$query = 'SELECT posts.id, posts.title FROM tags ';
		$query.= 'INNER JOIN taxonomy ON tags.id = taxonomy.tag_id ';
		$query.= 'INNER JOIN posts ON taxonomy.post_id = posts.id ';
		$query.= 'WHERE tags.title = :tag';

		$stmt = $this->db->prepare($query);
		$stmt->execute([
			':tag' => $tagName
		]);
		$posts = $stmt->fetchAll(PDO::FETCH_OBJ);

		return $posts;
	}
}
