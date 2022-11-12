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
        if (!empty($_POST)) {
            if (!$this->model->addValidate($_POST)) {
                $this->view->message('error', $this->model->error);
            };
            $id = $this->model->addFilm($_POST);
            $this->model->postUploadImage($_FILES['img']['tmp_name'], $id, $_POST);
            $this->model->addImage($id, $_POST);
            $this->view->message('success', 'Фильм добавлен');
        }
        $this->view->render('Добавить фильм');
    }

    public function editAction()
    {
        $id = $this->route['id'] ?? '';

        $vars = [
            'film_data' => $this->model->getFilm($id),
            'id' => $id,
        ];
        if (!empty($_POST)) {
            if (!$this->model->addValidate($_POST, 'edit')) {
                $this->view->message('error', $this->model->error);
            }
            $this->model->editFilm($_POST, $id);
            if (!empty($_FILES['img']['tmp_name'])) {
                $this->model->postUploadImage($_FILES['img']['tmp_name'], $id, $_POST);
                $this->model->addImage($id, $_POST);
            }
            $this->view->message('success', 'Фильм отредактирован');
        }
        $this->view->render('Редактировать', $vars);
    }

    public function filmsAction()
    {
        $vars = [
            'film_data' => $this->model->getFilm(),
        ];
        $this->view->render('Редактировать', $vars);
    }

    public function deleteAction()
    {
        $vars = [
            'film_data' => $this->model->getFilm(),
        ];
        $this->view->render('Удалить', $vars);
    }

    public function logoutAction()
    {
        unset($_SESSION['admin']);
        $this->view->redirect('admin/login');
    }
}
