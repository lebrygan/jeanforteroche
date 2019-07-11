<?php

abstract class Manager
{
	protected function dbConnect()
	{
		$host_name = 'db5000124356.hosting-data.io';
		$database = 'dbs118960';
		$user_name = 'dbu26750';
		$password = 'Cosmopoly12!';
		$dbName = 'dbs118960';
	    try{
	        $db = new PDO('mysql:host='.$host_name.';dbname='.$dbName.';charset=utf8', $user_name, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	        return $db;
	    }
	    catch(Exception $e){
	        die('Erreur : '.$e->getMessage());
	    }
	}
}