<?php

namespace application\models;

use application\core\Model;

class Admin extends Model
{
    public $error;

    public function addValidate($post, $type = 'add')
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
        if (empty($post['text']) || strlen($post['text']) > 10000) {
            $this->error = 'Поле "Описание" не может быть пустым и не должно превышать 10000 символов';
            return false;
        }
        if (empty($post['category'])) {
            $this->error = 'Выберите категорию';
            return false;
        }
        if (empty($_FILES['img']['tmp_name']) && $type == 'add') {
            $this->error = 'Прикрепите изображение';
            return false;
        }
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
        return $this->db->lastInsertId();
    }

    public function editFilm($post, $id)
    {
        $films = [
            'category_id' => $post['category'],
            'slug' => $post['slug'],
            'date' => $post['date'],
            'id' => $id,
        ];
        $films_d = [
            'title' => $post['title'],
            'text' => $post['text'],
            'id' => $id,
        ];
        $this->db->query('UPDATE films SET category_id = :category_id, slug = :slug, date = :date WHERE id = :id', $films);
        $this->db->query('UPDATE films_description SET title = :title, content = :text WHERE film_id = :id', $films_d);
    }

    public function postUploadImage($path, $id, $post)
    {
        if ($post['category'] == 1) {
            move_uploaded_file($path, 'public/images/films/' . $id . '.jpg');
        }
        if ($post['category'] == 2) {
            move_uploaded_file($path, 'public/images/serials/' . $id . '.jpg');
        }
        if ($post['category'] == 3) {
            move_uploaded_file($path, 'public/images/docs/' . $id . '.jpg');
        }
    }

    public function addImage($id, $post)
    {
        $films = [
            'id' => $id,
            'img' => '/public/images/films/' . $id . '.jpg',
        ];
        if ($post['category'] == 2) {
            $films['img'] = '/public/images/serials/' . $id . '.jpg';
        }
        if ($post['category'] == 3) {
            $films['img'] = '/public/images/docs/' . $id . '.jpg';
        }
        $this->db->query('UPDATE films SET img = :img WHERE id = :id', $films);
    }

    public function getFilm($id = 0)
    {
        if ($id) {
            $params = [
                'id' => $id,
            ];
            return $this->db->row('SELECT f.*, fd.* FROM films f JOIN films_description fd on f.id = fd.film_id WHERE id = :id', $params);
        } else {
            return $this->db->row('SELECT f.*, fd.* FROM films f JOIN films_description fd on f.id = fd.film_id');
        }
    }
}
