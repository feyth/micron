<?php
class homeController extends Controller {

	private $posts;

	public function __construct() {
		parent::__construct();
		$this->posts = new Posts();
	}

	public function index() {
		$dados = array();
		if (isset($_POST['email']) && !empty($_POST['email'])) {
			$users = new Users();
			$email = $this->sanitizeString($_POST['email']);
			$password = $this->sanitizeString($_POST['password']);
			$users->login($email, $password);
		}
		$limit = 10;
		$total = $this->posts->getTotalItems();
		$dados['pages'] = ceil($total/$limit);
		if (!empty($_GET['p'])) {
			$dados['currentPage'] = intval($_GET['p']);
		} else {
			$dados['currentPage'] = 1;
		}
		$offset = ($dados['currentPage'] * $limit) - $limit;
		$dados['posts'] = $this->posts->list($offset, $limit);
		$this->loadTemplate('home', $dados);
	}

	public function sitemap() {
		$dados = array();
		$total = $this->posts->getTotalItems();
		header("Content-Type: application/xml; charset=UTF-8");
		echo '<?xml version="1.0" encoding="UTF-8"?>';
		$dados['posts'] = $this->posts->list(0, $total);
		$this->loadView('sitemap', $dados);
	}

}
