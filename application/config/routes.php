<?php

return [
	// MainController

	'' => [
		'controller' => 'main',
		'action' => 'index',
	],

	'main' => [
		'controller' => 'main',
		'action' => 'index',
	],

	'filmpage/{id:\d+}' => [
		'controller' => 'main',
		'action' => 'filmpage',
	],

	// 'category/{name:.+}' => [
	// 	'controller' => 'main',
	// 	'action' => 'category',
	// ],

	'category/{name:.+}/{page:\d+}' => [
		'controller' => 'main',
		'action' => 'category',
	],

	// SearchController

	'search/livesearch' => [
		'controller' => 'search',
		'action' => 'livesearch',
	],

	'search/results' => [
		'controller' => 'search',
		'action' => 'results',
	],

	// RatingController

	'rating/like\?id\={id:\d+}' => [
		'controller' => 'rating',
		'action' => 'like',
	],

	'rating/dislike\?id\={id:\d+}' => [
		'controller' => 'rating',
		'action' => 'dislike',
	],

	// CommentsController

	'comments/add' => [
		'controller' => 'comments',
		'action' => 'add',
	],

	'comments/delete' => [
		'controller' => 'comments',
		'action' => 'delete',
	],

	// AccountController

	'account' => [
		'controller' => 'account',
		'action' => 'index',
	],

	'account/playlists' => [
		'controller' => 'account',
		'action' => 'playlists',
	],

	'account/comments' => [
		'controller' => 'account',
		'action' => 'comments',
	],

	'account/liked' => [
		'controller' => 'account',
		'action' => 'liked',
	],

	'account/disliked' => [
		'controller' => 'account',
		'action' => 'disliked',
	],

	// AuthorizationController

	'authorization/login' => [
		'controller' => 'authorization',
		'action' => 'login',
	],

	'authorization/registration' => [
		'controller' => 'authorization',
		'action' => 'registration',
	],

	'authorization/logout' => [
		'controller' => 'authorization',
		'action' => 'logout',
	],

	// AdminController

	'admin/login' => [
		'controller' => 'admin',
		'action' => 'login',
	],

	'admin/logout' => [
		'controller' => 'admin',
		'action' => 'logout',
	],

	'admin/add' => [
		'controller' => 'admin',
		'action' => 'add',
	],

	'admin/edit' => [
		'controller' => 'admin',
		'action' => 'edit',
	],

	'admin/edit/{id:\d+}' => [
		'controller' => 'admin',
		'action' => 'edit',
	],

	'admin/films' => [
		'controller' => 'admin',
		'action' => 'films',
	],

	'admin/delete' => [
		'controller' => 'admin',
		'action' => 'delete',
	],
];
