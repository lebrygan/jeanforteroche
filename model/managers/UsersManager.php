<?php
require_once('Manager.php');

class usersManager extends Manager{
	public function getPassword($email){
		$db = $this->dbConnect();

	    $q = $db->prepare('SELECT password FROM users WHERE email = :email');
	    $q->bindValue(':email', $email);
	    $q->execute();
	    $donnees = $q->fetch(PDO::FETCH_ASSOC);

	    return $donnees;
	}

	public function addUsers($email, $password){
		$db = $this->dbConnect();

	    $q = $db->prepare('INSERT INTO users(email, password) VALUES (:email, :password)');

	    $q->bindValue(':email', $email);
	    $q->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
	    $q->execute();
	}
}