<?php
class accountController extends Controller {

	private $users;

	public function __construct() {
		$this->users = new Users();
	}

    public function index() {
        $dados = array();
        if(isset($_POST['email']) && !empty($_POST['email'])){
			$email = $this->sanitizeString($_POST['email']);
			$password = $this->sanitizeString($_POST['password']);
			if($this->users->login($email, $password)) {
				$this->redirect();
			}
		}
        $this->loadView('login', $dados);
    }

    public function logout() {
		session_start();
		$_SESSION = array();
		session_destroy();
		$this->redirect();
	}

}
