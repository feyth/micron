<?php
class settingsController extends Controller {

	public function __construct() {
		parent::__construct();
		if (empty($_SESSION)) {
			header("Location: ".BASE_URL);
		}
	}

	public function index() {
		$dados = array();
		if (isset($_POST['sitename']) && !empty($_POST['sitename'])) {
			$configuracoes = new Config();
			$configuracoes->setPropriedade('sitename', $_POST['sitename']);
			$configuracoes->setPropriedade('author', $_POST['author']);
			$configuracoes->setPropriedade('description', $_POST['description']);
			$configuracoes->setPropriedade('disqus_site', $_POST['disqus_site']);
			header("Location: ".BASE_URL.'settings');
		}
		$this->loadTemplate('settings', $dados);
	}

}