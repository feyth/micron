<?php
class errorController extends Controller {

	public function index() {
		$this->redirect();
	}
	
	public function E404() {
		$dados = array();
		$dados['code'] = '404';
		$dados['message'] = 'O arquivo que você está tentando acessar não existe ou foi movido.';
		$this->loadTemplate('error', $dados);		
	}

	public function E403() {
		$dados = array();
		$dados['code'] = '403';
		$dados['message'] = 'Você não tem permissão para acessar diretórios.';
		$this->loadTemplate('error', $dados);
	}

}