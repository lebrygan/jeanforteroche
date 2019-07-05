<?php
function getPassword($email){
	$dbName = 'blogforteroche';
	try{
	    $db = new PDO('mysql:host=localhost;dbname='.$dbName.';charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	} catch(Exception $e){
	    die('Erreur : '.$e->getMessage());
	}

    $q = $db->prepare('SELECT password FROM users WHERE email = :email');
    $q->bindValue(':email', $email);
    $q->execute();
    $donnees = $q->fetch(PDO::FETCH_ASSOC);

    return $donnees;
}

function addUsers($email, $password){
	$dbName = 'blogforteroche';
	try{
	    $db = new PDO('mysql:host=localhost;dbname='.$dbName.';charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	} catch(Exception $e){
	    die('Erreur : '.$e->getMessage());
	}

    $q = $db->prepare('INSERT INTO users(email, password) VALUES (:email, :password)');

    $q->bindValue(':email', $email);
    $q->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
    $q->execute();
}