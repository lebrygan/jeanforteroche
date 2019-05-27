<?php
include('class/BilletsManager.php');
include('class/Billets.php');

$bddName = 'blogforteroche';

try{
	$bdd = new PDO('mysql:host=localhost;dbname='.$bddName.';charset=utf8', 'root', '');
} catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
}

$billetsManager = new BilletsManager($bdd);
$billet = new Billets([
	'id' => 4,
    'showOrder' => 4,
    'datePublication' => 20190524124600,
    'published' => true,
    'textPublication' => 'Test ajout BDD'
]);

$billetsManager->add($billet);