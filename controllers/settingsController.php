<?php
class settingsController extends Controller {

	public function __construct() {
		parent::__construct();
		$this->isLogged();
	}

	public function index() {
		$dados = array();
		if (isset($_POST['sitename']) && !empty($_POST['sitename'])) {
			$configuracoes = new Config();
			$configuracoes->setPropriedade('sitename', $this->sanitizeString($_POST['sitename']));
			$configuracoes->setPropriedade('author', $this->sanitizeString($_POST['author']));
			$configuracoes->setPropriedade('description', $this->sanitizeString($_POST['description']));
			$configuracoes->setPropriedade('disqus_site', $this->sanitizeString($_POST['disqus_site']));
			$this->redirect("settings");
		}
		$this->loadTemplate('settings', $dados);
	}

}
