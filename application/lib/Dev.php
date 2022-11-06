<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($str)
{
	echo '<pre>';
	var_dump($str);
	echo '</pre>';
	exit;
}

function get($key, $type = 'i')
{
	$param = $key;
	$$param = $_GET[$param] ?? '';
	if ($type == 'i') {
		return (int)$$param;
	} elseif ($type == 'f') {
		return (float)$$param;
	} else {
		return trim($$param);
	}
}

function redirect($http = false)
{
	if ($http) {
		$redirect = $http;
	} else {
		$redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
	}
	header("Location: $redirect");
	die;
}
