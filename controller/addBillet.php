<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/projet4/model/managers/BilletsManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/projet4/model/entitys/Billet.php');

if(isset($_POST['textPublication'])){
	$billetsManager = new BilletsManager;

	$data['textPublication'] = $_POST['textPublication'];
	if(isset($_POST['published']))
		$data['published'] = 1;
	else
		$data['published'] = 0;
	$billet = new Billet($data);

	$billetsManager->add($billet);
}

header('Location: ../index.php');