<?php

namespace application\models;

use application\core\Model;

class Rating extends Model
{

    public function getFilm($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->row('SELECT * FROM likes WHERE films_item_id = :id', $params);
    }

    public function getCountLikes($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->column('SELECT COUNT(films_item_id) FROM likes WHERE films_item_id = :id', $params);
    }

    public function likeFilm($id, $user_id)
    {
        $params = [
            'id' => $id,
            'user_id' => $user_id,
        ];
        // return $this->db->query('UPDATE films_description SET likes = 1 WHERE film_id =:id', $params);
        return $this->db->query('INSERT INTO likes VALUES (:id, :user_id)', $params);
    }

    public function checkLiked($film_id, $user_id)
    {
        $params = [
            'film_id' => $film_id,
            'user_id' => $user_id,
        ];
        if (($this->db->column('SELECT COUNT(films_item_id) FROM likes WHERE films_item_id = :film_id AND user_id = :user_id', $params) >= 1)) {
            return false;
        }
        return true;
    }

    public function deleteLike($film_id, $user_id)
    {
        $params = [
            'film_id' => $film_id,
            'user_id' => $user_id,
        ];
        $this->db->query('DELETE FROM likes WHERE films_item_id = :film_id AND user_id = :user_id', $params);
    }

    public function checkDisliked($film_id, $user_id)
    {
        $params = [
            'film_id' => $film_id,
            'user_id' => $user_id,
        ];
        if (($this->db->column('SELECT COUNT(films_item_id) FROM dislikes WHERE films_item_id = :film_id AND user_id = :user_id', $params) >= 1)) {
            return false;
        }
        return true;
    }

    public function deleteDislike($film_id, $user_id)
    {
        $params = [
            'film_id' => $film_id,
            'user_id' => $user_id,
        ];
        $this->db->query('DELETE FROM dislikes WHERE films_item_id = :film_id AND user_id = :user_id', $params);
    }

    public function getCountDislikes($id)
    {
        $params = [
            'id' => $id,
        ];
        return $this->db->column('SELECT COUNT(films_item_id) FROM dislikes WHERE films_item_id = :id', $params);
    }

    public function dislikeFilm($id, $user_id)
    {
        $params = [
            'id' => $id,
            'user_id' => $user_id,
        ];
        return $this->db->query('INSERT INTO dislikes VALUES (:id, :user_id)', $params);
    }
}
