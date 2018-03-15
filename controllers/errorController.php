<?php
class errorController extends Controller {
	
	public function index() {
		$dados = array();
		$dados['code'] = 'E404';
		$dados['message'] = 'O arquivo que você está tentando acessar não existe ou foi movido.';
		$this->loadTemplate('error', $dados);		
	}

	public function E403() {
		$dados = array();
		$dados['code'] = 'E403';
		$dados['message'] = 'Você não tem permissão para acessar diretórios.';
		$this->loadTemplate('error', $dados);
	}

}