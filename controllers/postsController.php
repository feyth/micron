<?php
class postsController extends Controller {

	private $posts;

	public function __construct() {
		parent::__construct();
		$this->posts = new Posts();
	}

	public function index() {
		$dados = array();
		$this->isLogged();
		$dados['posts'] = $this->posts->listForAdmin();
		$this->loadTemplate('posts', $dados);
	}

	public function trash() {
		$dados = array();
		$this->isLogged();
		$dados['posts'] = $this->posts->listTrashItems();
		$this->loadTemplate('postsTrash', $dados);
	}

	public function all() {
		$dados = array();
		$total = $this->posts->getTotalItems();
		$dados['posts'] = $this->posts->list(0, $total);
		$this->loadTemplate('postAll', $dados);
	}

	public function write() {
		$dados = array();
		$this->isLogged();
		if (isset($_POST['title']) && !empty($_POST['title'])) {
			$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
			$content = $_POST['content'];
			$published = filter_var($_POST['published'], FILTER_SANITIZE_STRING);
			$this->posts->post($title, $content, $published);
			header("Location: ".BASE_URL.'posts');
		}
		$this->loadTemplate('postWrite', $dados);
	}

	public function read($id = 0) {
		$dados = array();
		if ($this->posts->exists($id) && $this->posts->isPublished($id)) {
			$id = addslashes($id);
			$this->posts->addPreview($id);
			$dados['post'] = $this->posts->load($id);
		} else {
			header("Location: ".BASE_URL.'404');
		}
		$this->loadTemplate('postRead', $dados);
	}

	public function update($id = 0) {
		$dados = array();
		$this->isLogged();
		if ($this->posts->exists($id)) {
			$dados['post'] = $this->posts->load($id);
		} else {
			header("Location: ".BASE_URL.'404');
		}
		if (isset($_POST['title']) && !empty($_POST['title'])) {
			$title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
			$content = $_POST['content'];
			$published = filter_var($_POST['published'], FILTER_SANITIZE_STRING);
			$date = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
			$this->posts->update($id, $title, $content, $published, $date);
			header("Location: ".BASE_URL.'posts/update/'.$id);
		}
		$this->loadTemplate('postUpdate', $dados);
	}

	public function delete($id) {
		$this->isLogged();
		if ($this->posts->exists($id)) {
			$this->posts->delete($id);
			header("Location: ".BASE_URL.'posts');
		} else {
			header("Location: ".BASE_URL.'404');
		}
	}

	public function restore($id) {
		$this->isLogged();
		if ($this->posts->exists($id)) {
			$this->posts->restore($id);
			header("Location: ".BASE_URL.'posts/trash');
		} else {
			header("Location: ".BASE_URL.'404');
		}
	}

}