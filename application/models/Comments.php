<?php

namespace application\models;

use application\core\Model;

class Comments extends Model
{
    public function commentValidate($post)
    {
        $textLen = $post;
        if (strlen($textLen) < 3 || strlen($textLen) > 800) {
            $this->error = 'Длина комментария не должна быть менее 3 и более 800 символов';
            return false;
        }
        return true;
    }

    public function addComment($post, $film_id)
    {
        $params = [
            'text' => $post,
            'film_id' => $film_id,
            'user_id' => $_SESSION['user_id'],
            'user_login' => $_SESSION['user_login'],
            'comment_date' => date('Y-m-d H:i:s'),
        ];
        $this->db->query('INSERT INTO comments (film_id, user_id, user_login, text, comment_date) VALUES (:film_id, :user_id, :user_login, :text, :comment_date)', $params);
    }

    public function getComments($film_id)
    {
        $params = [
            'film_id' => $film_id,
        ];
        return $this->db->row('SELECT * FROM comments WHERE film_id = :film_id ORDER BY id DESC', $params);
    }

    public function deleteComment($id)
    {
        $params = [
            'id' => $id,
        ];
        $this->db->query('DELETE FROM comments WHERE id = :id', $params);
    }
}
