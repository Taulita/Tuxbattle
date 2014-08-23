<?php
	session_start();

	require("sources/confphp/parametres.conf.php");
	require("models/arme.class.php");
	require("models/combattant.class.php");
	require("models/potion.class.php");
	require("models/sort.class.php");

	//HTML.Document.Application
	$page = "user.login";
	$game = "game";
	
	if(isset($_GET["page"])){
		$page=$_GET["page"];
	}

	if(isset($_GET["game"])){
		$game = $_GET["game"];
	}

	require("apps/skel.php");

?>