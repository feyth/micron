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
			$title = $this->sanitizeString($_POST['title']);
			$content = $_POST['content'];
			$published = $this->sanitizeString($_POST['published']);
			$this->posts->post($title, $content, $published);
			$this->redirect("posts");
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
			$this->redirect("404");
		}
		$this->loadTemplate('postRead', $dados);
	}

	public function update($id = 0) {
		$dados = array();
		$this->isLogged();
		if ($this->posts->exists($id)) {
			$dados['post'] = $this->posts->load($id);
		} else {
			$this->redirect("404");
		}
		if (isset($_POST['title']) && !empty($_POST['title'])) {
			$title = $this->sanitizeString($_POST['title']);
			$content = $_POST['content'];
			$published = $this->sanitizeString($_POST['published']);
			$date = $this->sanitizeString(($_POST['date']);
			$this->posts->update($id, $title, $content, $published, $date);
			$this->redirect("posts/update/".$id);
		}
		$this->loadTemplate('postUpdate', $dados);
	}

	public function delete($id) {
		$this->isLogged();
		if ($this->posts->exists($id)) {
			$this->posts->delete($id);
			$this->redirect("posts");
		} else {
			$this->redirect("404");
		}
	}

	public function restore($id) {
		$this->isLogged();
		if ($this->posts->exists($id)) {
			$this->posts->restore($id);
			$this->redirect("posts/trash");
		} else {
			$this->redirect("404");
		}
	}

}
