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
			$email = filter_var(addslashes($_POST['email']), FILTER_SANITIZE_STRING);
			$password = filter_var(addslashes($_POST['password']), FILTER_SANITIZE_STRING);
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

	public function proposta() {
		if (isset($_POST['name']) && !empty($_POST['name'])) {
			$name = filter_var(addslashes($_POST['name']), FILTER_SANITIZE_STRING);
			$email = filter_var(addslashes($_POST['email']), FILTER_SANITIZE_STRING);
			$telefone = filter_var(addslashes($_POST['telefone']), FILTER_SANITIZE_STRING);
			$mensagem = filter_var(addslashes($_POST['mensagem']), FILTER_SANITIZE_STRING);
		} else {
			header("Location: ".BASE_URL);
			exit;
		}
	}

}