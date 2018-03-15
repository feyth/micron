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
			header("Location: ".BASE_URL);
			exit;
		}
	}

}