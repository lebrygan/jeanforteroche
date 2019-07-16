<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/model/managers/BilletsManager.php');
require_once($_SERVER['DOCUMENT_ROOT'].'/model/managers/CommentsManager.php');


//Main controller, load pages for the client

function visitorsView(){
	$billetsManager = new BilletsManager;
	$billets = $billetsManager->getList(true);

	$commentsManager = new CommentsManager;


	$comments = [];

	$content = '';
	$script = '';

	foreach ($billets as $billet) {
		$comments = $commentsManager->getList($billet->id(),false);
		require('view/visitorsView/billets.php');

	}
	require('view/visitorsView/footer.php');
	require('view/template.php');
}

function authorView(){
	$billetsManager = new BilletsManager;
	$billets = $billetsManager->getList();

	$commentsManager = new CommentsManager;
	$comments = $commentsManager->getSignaled();

	$content = '';
	$script = '';
	require('view/authorView/addChangeUsers.php');
	if(count($comments) > 0)
		require('view/authorView/signaledComment.php');
	else
		require('view/authorView/noSignaledComment.php');
	require('view/authorView/addBillet.php');
	foreach ($billets as $i => $billet){
		$comments = $commentsManager->getList($billet->id(),false);
		require('view/authorView/oldBillets.php');
	}

	$script = '<script src="js/manageUsers.js"></script>';
	$script .='<script src="js/manageBillet.js"></script>';
	$script .='<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=5dq4ykchp5kaozo8vxeqvqp20ycwj2n7b7fj2p2mwgbo4z2a"></script>';
	$script .='<script>tinymce.init({selector: ".tinyMCEarea"});</script>';

	require('view/template.php');
}

function authorConnect(){
	$content = '';
	$script = '<script src="js/forgotUsers.js"></script>';
	require('view/authorView/access.php');
	require('view/template.php');
}