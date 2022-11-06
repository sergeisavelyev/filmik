<?php

namespace application\controllers;

use application\core\Controller;

class CommentsController extends Controller
{
    public function responce($status, $message, $text, $user, $comment_date)
    {
        exit(json_encode([
            'status' => $status,
            'message' => $message,
            'text' => $text,
            'user' => $user,
            'comment_date' => $comment_date,
        ]));
    }

    public function addAction()
    {
        $text = $_POST['text'];
        $user = $_SESSION['user_login'];
        $film_id = $_POST['id'];
        $user_id = $_SESSION['user_id'] ?? NULL;

        if (!empty($_POST)) {
            if (!isset($user_id)) {
                $this->view->message('error', 'Войдите или зарегистрируйтесь, чтобы поставить оценку');
            }
            if (!$this->model->commentValidate($text)) {
                $this->view->message('error', $this->model->error);
            }
            $this->model->addComment($text, $film_id);
            $this->responce('success', 'Комментарий добавлен', $text, $user, date('Y-m-d H:i:s'));
        }
    }

    public function deleteAction()
    {
        $commentId = $_POST['id'];
        $this->model->deleteComment($commentId);
        exit(json_encode([
            'status' => 'success',
            'message' => 'Комментарий успешно удален',
        ]));
    }
}
