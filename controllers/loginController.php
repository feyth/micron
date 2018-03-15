<?php
class loginController extends Controller {

	private $users;

	public function __construct() {
		$this->users = new Users();
	}

    public function index() {
        $dados = array();
        if(isset($_POST['email']) && !empty($_POST['email'])){
			$email = filter_var(addslashes($_POST['email']), FILTER_SANITIZE_STRING);
			$password = filter_var(addslashes($_POST['password']), FILTER_SANITIZE_STRING);
			if($this->users->login($email, $password)) {
				header("Location: ".BASE_URL);
			}
		}
        $this->loadView('login', $dados);
    }

    public function sair() {
		session_start();
		$_SESSION = array();
		session_destroy();
		header("Location: ".BASE_URL);		
	}

}