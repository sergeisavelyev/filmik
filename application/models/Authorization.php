<?php

namespace application\models;

use application\core\Model;

class Authorization extends Model
{
    public $error;

    public function loginValidate($post)
    {
        $params = [
            'login' => $post['login'],
            'password' => $post['password'],
        ];
        if (!$this->db->row('SELECT login , password FROM users WHERE login = :login AND password = :password', $params)) {
            $this->error = 'Логин/пароль неверный';
            return false;
        }
        return true;
    }

    public function getUserId($post)
    {
        $params = [
            'login' => $post['login'],
        ];
        return $this->db->column('SELECT id FROM users WHERE login = :login', $params);
    }

    public function registrationValidate($post)
    {
        $loginLen = strlen($post['login']);
        $passwordLen = strlen($post['password']);
        if ($loginLen < 4 || $loginLen > 20) {
            $this->error = 'Поле логин должно быть не менее 4 и не более 20 символов';
            return false;
        }
        if ($passwordLen < 4 || $passwordLen > 20) {
            $this->error = 'Поле пароль должно быть не менее 4 и не более 20 символов';
            return false;
        }
        return true;
    }

    public function getUsers($post)
    {
        $params = [
            'login' => $post['login'],
        ];
        if ($this->db->row('SELECT login FROM users WHERE login = :login', $params)) {
            $this->error = 'Пользователь с таким именем уже существует';
            return false;
        }
        return true;
    }

    public function userAdd($post)
    {
        $params = [
            'id' => '',
            'login' => $post['login'],
            'password' => $post['password'],
        ];
        $this->db->query('INSERT INTO users VALUE (:id, :login, :password)', $params);
        return $this->db->lastInsertId();
    }
}
