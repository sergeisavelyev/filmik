<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
    public function indexAction()
    {
        $this->view->render('Мой профиль');
    }

    public function playlistsAction()
    {
        $this->view->render('Мой профиль');
    }

    public function commentsAction()
    {
        $vars = [
            'comments' => $this->model->getComments($_SESSION['user_id']),
        ];
        $this->view->render('Мои комментарии', $vars);
    }

    public function likedAction()
    {
        $vars = [
            'ratedFilms' => $this->model->getRatedFilms($_SESSION['user_id'], 1),
        ];
        $this->view->render('Понравилось', $vars);
    }

    public function dislikedAction()
    {
        $vars = [
            'ratedFilms' => $this->model->getRatedFilms($_SESSION['user_id'], 0),
        ];
        $this->view->render('Не понравилось', $vars);
    }
}
