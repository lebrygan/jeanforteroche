<?php
include('BilletsManager.php');
include('Billet.php');
include('CommentsManager.php');
include('Comment.php');



//Connexion to database
function dbConnect()
{
	$dbName = 'blogforteroche';
    try{
        $db = new PDO('mysql:host=localhost;dbname='.$dbName.';charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e){
        die('Erreur : '.$e->getMessage());
    }
}