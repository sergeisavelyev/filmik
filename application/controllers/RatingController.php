<?php

namespace application\controllers;

use application\core\Controller;

class RatingController extends Controller
{

    public function likeAction()
    {
        $user_id = $_SESSION['user_id'] ?? NULL;
        $id = get('id');
        if (!$id) {
            $answer = ['result' => 'error', 'text' => 'Ошибка'];
            exit(json_encode($answer));
        };
        if (!isset($user_id)) {
            $this->view->message('error', 'Войдите или зарегистрируйтесь, чтобы поставить оценку');
        } else {
            if (!$this->model->checkLiked($id, $user_id)) {
                $this->model->deleteLike($id, $user_id);
                $count = $this->model->getCountLikes($id);
                $this->out('success', 'Фильм удален из списка "Понравилось"', $count);
            } else {
                $this->model->likeFilm($id, $user_id);
                $count = $this->model->getCountLikes($id);
                $this->out('success', 'Фильм добавлен в список "Понравилось"', $count);
            }
        }
    }

    public function dislikeAction()
    {
        $user_id = $_SESSION['user_id'] ?? NULL;
        $id = get('id');
        if (!$id) {
            $answer = ['result' => 'error', 'text' => 'Ошибка'];
            exit(json_encode($answer));
        };
        if (!isset($user_id)) {
            $this->view->message('error', 'Войдите или зарегистрируйтесь, чтобы поставить оценку');
        } else {
            if (!$this->model->checkDisliked($id, $user_id)) {
                $this->model->deleteDislike($id, $user_id);
                $count = $this->model->getCountDislikes($id);
                $this->out('success', 'Фильм удален из списка "Не понравилось"', $count);
            } else {
                $this->model->dislikeFilm($id, $user_id);
                $count = $this->model->getCountDislikes($id);
                $this->out('success', 'Фильм добавлен в список "Не понравилось"', $count);
            }
        }
    }
}
