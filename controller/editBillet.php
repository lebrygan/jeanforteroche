<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/managers/BilletsManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/entitys/Billet.php');

if(isset($_POST['textPublication']) && isset($_POST['idBillet'])){
	$billetsManager = new BilletsManager;

	$data['textPublication'] = $_POST['textPublication'];
	$data['id'] = $_POST['idBillet'];
	if(isset($_POST['published']))
		$data['published'] = 1;
	else
		$data['published'] = 0;
	$billet = new Billet($data);

	$billetsManager->update($billet);
}else{
	throw new InvalidArgumentException("Le text ou le billet n'ont pas été spécifié");
}

header('Location: ../index.php');