<?php

namespace application\models;

use application\core\Model;

class Account extends Model
{
    public function getComments($user_id)
    {
        $params = [
            'user_id' => $user_id,
        ];
        return $this->db->row('SELECT c.* , f.id, f.date, f.img , fd.title FROM comments c JOIN films f ON c.film_id = f.id
        JOIN films_description fd ON fd.film_id = f.id  WHERE user_id = :user_id ORDER BY c.id DESC', $params);
    }

    public function getRatedFilms($user_id, $rating)
    {
        $params = [
            'user_id' => $user_id,
        ];
        if ($rating) {
            return $this->db->row('SELECT l.* , f.id , f.date , f.img , fd.title FROM likes l JOIN films f ON l.films_item_id = f.id
            JOIN films_description fd ON f.id = fd.film_id WHERE user_id = :user_id', $params);
        } else {
            return $this->db->row('SELECT d.* , f.id , f.date , f.img , fd.title FROM dislikes d JOIN films f ON d.films_item_id = f.id
            JOIN films_description fd ON f.id = fd.film_id WHERE user_id = :user_id', $params);
        }
    }
}
