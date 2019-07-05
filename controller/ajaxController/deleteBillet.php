<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/projet4/model/managers/BilletsManager.php');

if(isset($_POST['billet'])){
	$billetsManager = new BilletsManager;

	$billetsManager->delete($_POST['billet']);
}