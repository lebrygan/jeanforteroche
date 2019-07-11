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

	public function changePwd($email,$pwd){
		$db = $this->dbConnect();

	    $q = $db->prepare('UPDATE users SET password = :pwd WHERE email = :email');

	    $q->bindValue(':email', $email);
	    $q->bindValue(':pwd', password_hash($password, PASSWORD_DEFAULT));
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
	    	$message = 'Voici votre mot de passe provisoire : '.$randomPassword.'\n';
	    	$message .= 'Veuillez vous connecter afin de modifier votre mot de passe.';
	    	$headers = array(
			    'From' => 'webmaster@example.com',
			    'Reply-To' => 'webmaster@example.com',
			    'X-Mailer' => 'PHP/' . phpversion()
			);
	    	mail($email,'Changement de mot de passe',$message,$headers); 
	    }

	}
}