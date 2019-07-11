<?php
require_once('Manager.php');

class UsersManager extends Manager{
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

	public function delete($email){
		$db = $this->dbConnect();

	    $q = $db->prepare('DELETE FROM users WHERE email = :email');

	    $q->bindValue(':email', $email);
	    $q->execute();
	}

	public function changePwd($email,$pwd){
		$db = $this->dbConnect();

	    $q = $db->prepare('UPDATE users SET password = :pwd WHERE email = :email');

	    $q->bindValue(':email', $email);
	    $q->bindValue(':pwd', password_hash($pwd, PASSWORD_DEFAULT));
	    $q->execute();
	}

	public function forgotPwd($email){
		$db = $this->dbConnect();

	    $q = $db->prepare('SELECT email FROM users WHERE email = :email');
	    $q->bindValue(':email', $email);
	    $q->execute();
	    if($donnees = $q->fetch(PDO::FETCH_ASSOC)){
	    	$randomPassword = bin2hex(random_bytes(5));
	    	$this->changePwd($email,$randomPassword);
	    	$message ='<html><head><title>Mot de passe oublié</title></head>
                <body><p>Voici votre mot de passe provisoire :'.$randomPassword.'</p></body></html>';
 
	    	$headers ='From: "Jean Forteroche"<programmation@cosmopoly.fr>'."\n";
            $headers .='Reply-To: programmation@cosmopoly.fr'."\n";
            $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
            $headers .='Content-Transfer-Encoding: 8bit';
	    	mail($email,'Mot de passe oublié',$message,$headers);
	    }
	}
}