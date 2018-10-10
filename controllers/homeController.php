<?php
class homeController extends Controller {

	private $posts;

	public function __construct() {
		parent::__construct();
		$this->posts = new Posts();
	}

	public function index() {
		$data = array();
		if (isset($_POST['email']) && !empty($_POST['email'])) {
			$users = new Users();
			$email = $this->sanitizeString($_POST['email']);
			$password = $this->sanitizeString($_POST['password']);
			$users->login($email, $password);
		}
		$limit = 5;
		$total = $this->posts->getTotalItems();
		$data['pages'] = ceil($total/$limit);
		if (!empty($_GET['p'])) {
			$data['currentPage'] = intval($this->sanitizeString($_GET['p']));
		} else {
			$data['currentPage'] = 1;
		}
		$offset = ($data['currentPage'] * $limit) - $limit;
		$data['posts'] = $this->posts->list($offset, $limit);
		$this->loadTemplate('home', $data);
	}

	public function sitemap() {
		$data = array();
		$total = $this->posts->getTotalItems();
		header("Content-Type: application/xml; charset=UTF-8");
		echo '<?xml version="1.0" encoding="UTF-8"?>';
		$data['posts'] = $this->posts->list(0, $total);
		$this->loadView('sitemap', $data);
	}

}
