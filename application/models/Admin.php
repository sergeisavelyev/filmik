<?php

namespace application\models;

use application\core\Model;

class Admin extends Model
{
    public $error;

    public function addValidate($post)
    {
        if (empty($post['title']) || strlen($post['title']) > 100) {
            $this->error = 'Поле "Название" не может быть пустым и не должно превышать 100 символов';
            return false;
        }
        if (empty($post['slug']) || strlen($post['slug']) > 100) {
            $this->error = 'Поле "Slug" не может быть пустым и не должно превышать 100 символов';
            return false;
        }
        if (empty($post['date']) || !preg_match("|^[\d]*$|", $post['date']) || strlen($post['date']) != 4) {
            $this->error = 'Поле "Год" не может быть пустым и может состоять только из числа из 4 цифр';
            return false;
        }
        if (empty($post['text']) || strlen($post['text']) > 1000) {
            $this->error = 'Поле "Описание" не может быть пустым и не должно превышать 1000 символов';
            return false;
        }
        if (empty($post['category'])) {
            $this->error = 'Выберите категорию';
            return false;
        }
        // if (empty($_FILES['img']['tmp_name'])) {
        //     $this->error = 'Прикрепите изображение';
        //     return false;
        // }
        return true;
    }

    public function addFilm($post)
    {
        $films = [
            'category_id' => $post['category'],
            'slug' => $post['slug'],
            'date' => $post['date'],
        ];
        $films_d = [
            'title' => $post['title'],
            'text' => $post['text'],
        ];
        $this->db->query('INSERT INTO films (category_id, slug, date) VALUES (:category_id, :slug, :date)', $films);
        $this->db->query('INSERT INTO films_description (title, content) VALUES (:title, :text)', $films_d);
        // return $this->db->lastInsertId();
    }
}
