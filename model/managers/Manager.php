<?php

abstract class Manager
{
	protected function dbConnect()
	{
		$hostName = 'db5000124356.hosting-data.io';
		$userName = ''; //Add your username
		$password = ''; //Add your password
		$dbName = 'dbs118960';
        $db = new PDO('mysql:host='.$hostName.';dbname='.$dbName.';charset=utf8', $userName, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
	}
}