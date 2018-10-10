<?php
class Posts extends Model {

	public function exists($id) {
		$sql = $this->db->prepare("SELECT id FROM posts WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function load($id) {
		$sql = $this->db->prepare("SELECT * FROM posts WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
		return $sql->fetch();
	}

	public function addPreview($id) {
		if (empty($_SESSION)) {
			$sql = $this->db->prepare("UPDATE posts SET views = views + 1 WHERE id = :id");
			$sql->bindValue(":id", $id);
			$sql->execute();
		}
	}

	public function list($offset, $limit) {
		$sql = $this->db->query("SELECT * FROM posts WHERE published = 1 ORDER BY date DESC LIMIT $offset, $limit");
		return $sql->fetchAll();
	}

	public function getTotalItems() {
		$sql = $this->db->query("SELECT COUNT(id) as c FROM posts");
		$sql = $sql->fetch();
		return $sql['c'];
	}

	public function listTrashItems() {
		$sql = $this->db->query("SELECT * FROM posts WHERE trash = 1 ORDER BY date DESC");
		return $sql->fetchAll();
	}

	public function listForAdmin() {
		$sql = $this->db->query("SELECT * FROM posts WHERE trash = 0 ORDER BY date DESC");
		return $sql->fetchAll();
	}

	public function post($title, $content, $published) {
		$sql = $this->db->prepare("INSERT INTO posts SET title = :title, content = :content, uri = :uri, date = :date, published = :published, trash = 0, views = 0");
		$sql->bindValue(":title", $title);
		$sql->bindValue(":content", $content);
		$sql->bindValue(":uri", $this->slugator($title));
		$sql->bindValue(":date", date('Y-m-d H:i:s', time()));
		$sql->bindValue(":published", $published);
		$sql->execute();
	}

	public function update($id, $title, $content, $published, $date) {
		$sql = $this->db->prepare("UPDATE posts SET title = :title, content = :content, uri = :uri, published = :published, date = :date WHERE id = :id");
		$sql->bindValue(":title", $title);
		$sql->bindValue(":content", $content);
		$sql->bindValue(":uri", $this->titleToURI($title));
		$sql->bindValue(":published", $published);
		$sql->bindValue(":date", $date);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	public function isPublished($id) {
		$sql = $this->db->prepare("SELECT published FROM posts WHERE id = :id AND published = 1");
		$sql->bindValue(":id", $id);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function delete($id) {
		$sql = $this->db->prepare("UPDATE posts SET trash = 1, published = 0 WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	public function restore($id) {
		$sql = $this->db->prepare("UPDATE posts SET trash = 0, published = 0 WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	private function slugator($string) {
		return strtolower(preg_replace('/[^\\pL\d_]+/u', '-', $string));
	}

}