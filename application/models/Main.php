<?php

namespace application\models;

use application\core\Model;

class Main extends Model
{
	public function getHits()
	{
		return $this->db->row('SELECT f.* , fd.* FROM films f JOIN films_description fd ON f.id = fd.film_id WHERE f.hit = 1  ORDER BY f.id LIMIT 4');
	}

	public function onMainByCategory($id)
	{
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT f.* , fd.* FROM films f JOIN films_description fd ON f.id = fd.film_id WHERE category_id = :id ORDER BY f.id DESC LIMIT 4', $params);
	}

	public function filmInfo($id)
	{
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT f.* , fd.* FROM films f JOIN films_description fd ON f.id = fd.film_id WHERE id = :id', $params);
	}

	public function getCategory($name)
	{
		$params = [
			'name' => $name,
		];
		return $this->db->row('SELECT * FROM category WHERE slug = :name', $params);
	}

	public function categoryById($id)
	{
		$params = [
			'id' => $id,
		];
		return $this->db->row('SELECT c.* , fd.film_id FROM category c JOIN films_description fd ON c.id = fd.film_id WHERE id = :id', $params);
	}

	public function filmsById($id)
	{
		$params = [
			'id' => $id,
		];
		if ($id == '6') {
			return $this->db->row('SELECT f.* , fd.* FROM films f JOIN films_description fd ON f.id = fd.film_id WHERE f.hit = 1  ORDER BY f.id DESC LIMIT 20');
		} else {
			return $this->db->row('SELECT f.* , fd.* FROM films f JOIN films_description fd ON f.id = fd.film_id WHERE f.category_id = :id  ORDER BY f.id DESC', $params);
		}
	}
}
