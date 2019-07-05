<?php

abstract class Manager
{
	protected function dbConnect()
	{
		$dbName = 'blogforteroche';
	    try{
	        $db = new PDO('mysql:host=localhost;dbname='.$dbName.';charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	        return $db;
	    }
	    catch(Exception $e){
	        die('Erreur : '.$e->getMessage());
	    }
	}
}