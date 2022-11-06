<?php

namespace application\controllers;

use application\core\Controller;

class AuthorizationController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        $this->view->layout = 'authorization';
    }

    public function loginAction()
    {
        if (isset($_SESSION['authorize'])) {
            $this->view->redirect('account');
        }
        if (!empty($_POST)) {
            if (!$this->model->loginValidate($_POST)) {
                $this->view->message('error', $this->model->error);
            }
            $_SESSION['authorize'] = 1;
            $_SESSION['user_login'] = $_POST['login'];
            $_SESSION['user_id'] = $this->model->getUserId($_POST);
            $this->view->location('account');
        }
        $this->view->render('Вход');
    }

    public function registrationAction()
    {
        if (!empty($_POST)) {
            if (!$this->model->registrationValidate($_POST)) {
                $this->view->message('error', $this->model->error);
            }
            if (!$this->model->getUsers($_POST)) {
                $this->view->message('error', $this->model->error);
            }
            $newUser = $this->model->userAdd($_POST);
            if (!$newUser) {
                $this->view->message('error', 'Ошибка обработки запроса');
            }
            $this->view->message('success', 'Поздравляем! Вы успешно зарегестрированы');
        }
        $this->view->render('Регистрация');
    }

    public function logoutAction()
    {
        unset($_SESSION['authorize']);
        unset($_SESSION['user_login']);
        unset($_SESSION['user_id']);
        $this->view->redirect('authorization/login');
    }
}
