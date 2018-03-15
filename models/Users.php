<?php
class Users extends Model {

	public function login($email, $password){
		$sql = $this->db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
		$sql->bindValue(":email", $email);
		$sql->bindValue(":password", md5($password));
		$sql->execute();
		if($sql->rowCount() > 0){
			$dados = $sql->fetch();
			$_SESSION['id'] = $dados['id'];
			return true;
		}else{
			return false;
		}
	}

	public function getUsuario() {
		$sql = $this->db->prepare("SELECT * FROM users WHERE token = :token");
		$sql->bindValue(":token", $_SESSION['token']);
		$sql->execute();
		return $sql->fetch();
	}

	public function getNome() {
		$sql = $this->db->prepare("SELECT nome FROM users WHERE token = :token");
		$sql->bindValue(":token", $_SESSION['token']);
		$sql->execute();
		$sql = $sql->fetch();
		return $sql['name'];
	}

}