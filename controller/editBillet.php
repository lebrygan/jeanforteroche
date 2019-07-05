<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/projet4/model/managers/BilletsManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/projet4/model/entitys/Billet.php');

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
}

header('Location: ../index.php');