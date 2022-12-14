<?php

namespace application\controllers;

use application\core\Controller;
use application\models\Rating;
use application\models\Comments;
use application\lib\Pagination;


class MainController extends Controller
{
	public function indexAction()
	{
		$vars = [
			'filmsHits' => $this->model->getHits(),
			'films' => $this->model->onMainByCategory(1),
			'serials' => $this->model->onMainByCategory(2),
		];
		$this->view->render('Главная страница', $vars);
	}

	public function filmpageAction()
	{
		$filmRating = new Rating;
		$comments = new Comments;

		$film = $this->model->filmInfo($this->route['id']);
		$vars = [
			'film_info' => $film,
			'comments' => $comments->getComments($this->route['id']),
			'category_info' => $this->model->categoryById($film[0]['category_id'] ?? ''),
			'film_rating' => $filmRating->getCountLikes($this->route['id']),
			'film_disrating' => $filmRating->getCountDislikes($this->route['id']),
			'check_liked' => $filmRating->checkLiked($this->route['id'], $_SESSION['user_id'] ?? ''),
			'check_disliked' => $filmRating->checkDisliked($this->route['id'], $_SESSION['user_id'] ?? ''),
		];
		$this->view->render('О фильме', $vars);
	}

	public function categoryAction()
	{
		$category = $this->model->getCategory($this->route['name']);
		$count = $this->model->filmsByIdCount($category[0]['id']);

		// debug($category[0]['id']);

		$pagination = new Pagination($this->route, $count, 4);
		$vars = [
			'category_info' => $category,
			'films' => $this->model->filmsById($category[0]['id'], $this->route),
			'pagination' => $pagination->get(),
		];
		$this->view->render('Категория', $vars);
	}
}
