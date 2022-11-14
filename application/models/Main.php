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

	public function filmsById($id, $route)
	{
		$max = 4;
		$params = [
			'id' => $id,
			'max' => $max,
			'start' => (($route['page'] ?? 1) - 1) * $max,
		];
		if ($id == '6') {
			$params = [
				'max' => $max,
				'start' => (($route['page'] ?? 1) - 1) * $max,
			];
			return $this->db->row('SELECT f.* , fd.* FROM films f JOIN films_description fd ON f.id = fd.film_id WHERE f.hit = 1  ORDER BY f.id DESC LIMIT :start, :max', $params);
		} else {
			return $this->db->row('SELECT f.* , fd.* FROM films f JOIN films_description fd ON f.id = fd.film_id WHERE f.category_id = :id  ORDER BY f.id DESC LIMIT :start, :max', $params);
		}
	}

	public function filmsByIdCount($id)
	{
		$params = [
			'id' => $id,
		];
		if ($id == '6') {
			return $this->db->column('SELECT COUNT(id) FROM films WHERE hit = 1');
		} else {
			return $this->db->column('SELECT COUNT(id) FROM films WHERE category_id = :id', $params);
		}
	}
}
