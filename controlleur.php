<?php
require_once('model/BilletsManager.php');
require_once('model/CommentsManager.php');

function visitorsView(){
	$billetsManager = new BilletsManager;
	$billets = $billetsManager->getList();
	require('view/visitorsView.php');
}