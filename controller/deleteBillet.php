<?php
require_once('../model/BilletsManager.php');
require_once('../model/Billet.php');

if(isset($_POST['billet'])){
	$billetsManager = new BilletsManager;

	$billetsManager->delete($_POST['billet']);
}