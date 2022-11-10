<?php

namespace application\controllers;

use application\core\Controller;

class AdminController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'admin';
    }

    public function loginAction()
    {
        $params = require_once 'application/config/params.php';
        $login = $_POST['login'];
        $password = $_POST['password'];
        if (isset($_SESSION['admin'])) {
            $this->view->redirect('admin/add');
        }
        if (!empty($_POST)) {
            if ($login != $params['admin_login'] || $password != $params['admin_password']) {
                $this->view->message('error', 'Логин/ Пароль введен неправильно');
            }
            $_SESSION['admin'] = 1;
            $this->view->location('admin/add');
        }
        $this->view->render('Вход');
    }

    public function addAction()
    {
        $this->view->render('Добавить пост');
    }

    public function editAction()
    {
        $this->view->render('Редактировать');
    }

    public function deleteAction()
    {
        exit('Удаление');
    }

    public function logoutAction()
    {
        unset($_SESSION['admin']);
        exit('Выход');
    }
}
