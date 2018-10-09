<?php
class Controller {

	private $config;

	public function __construct() {
		$c = new Config();
		$this->config = $c->getConfig();
	}

	public function loadView($viewName, $viewData = array()) {
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}

	public function loadTemplate($viewName, $viewData = array()) {
		require 'views/template.php';
	}

	public function loadViewInTemplate($viewName, $viewData = array()) {
		extract($viewData);
		require 'views/'.$viewName.'.php';
	}

	public function isLogged() {
		if (empty($_SESSION['id'])) {
			$this->redirect();
		}
	}

	public function sanitizeString($string) {
		return $string = filter_var(addslashes($string), FILTER_SANITIZE_STRING);
	}

	public function slugator($string) {
		return strtolower(preg_replace('/[^\\pL\d_]+/u', '-', $string));
	}

	public function redirect($to = "") {
		header("Location: ". BASE_URL . $to);
		exit;
	}

}
