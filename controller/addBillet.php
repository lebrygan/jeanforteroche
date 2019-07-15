<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/managers/BilletsManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/entitys/Billet.php');

//add Billet in the database
if(isset($_POST['textPublication'])){
	$billetsManager = new BilletsManager;

	$data['textPublication'] = $_POST['textPublication'];
	if(isset($_POST['published']))
		$data['published'] = 1;
	else
		$data['published'] = 0;
	$billet = new Billet($data);

	$billetsManager->add($billet);
}else{
	throw new InvalidArgumentException("Le text de la publication n'a pas été spécifié");
}

header('Location: ../');