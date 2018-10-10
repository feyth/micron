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
			$configuracoes->setProperty('sitename', $this->sanitizeString($_POST['sitename']));
			$configuracoes->setProperty('author', $this->sanitizeString($_POST['author']));
			$configuracoes->setProperty('description', $this->sanitizeString($_POST['description']));
			$configuracoes->setProperty('disqus_site', $this->sanitizeString($_POST['disqus_site']));
			$this->redirect("configuracoes");
		}
		$this->loadTemplate('settings', $dados);
	}

}
