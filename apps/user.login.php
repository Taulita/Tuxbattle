<?php

// $db = mysqli_connect('localhost', 'root', 'troiswa', 'tuxbattle');
$error='';
$joueur='';

if(isset($_SESSION['joueur']))
{
	//require('index.php?page=content');
	$req="INSERT INTO t_game(name1,name2) VALUES('".$_SESSION['joueur']."','computer')";
	mysqli_query($db, $req);
	$_SESSION['partie']=mysqli_insert_id($db);
	require("apps/content.php");

}

else if(isset($_POST['f_joueur'], $_POST['f_password'], $_POST['f_btn_connexion']) && $_POST['f_email'] == "")
{
	$joueur = mysqli_real_escape_string($db, $_POST['f_joueur']);
	$password = mysqli_real_escape_string($db, $_POST['f_password']);
	$res = mysqli_query($db, "SELECT * FROM t_joueur WHERE nom ='".$joueur."'");
	$data = mysqli_fetch_assoc($res);

	if ($data == NULL)
	{
		//header("location: index.php?page=user.login");
		$joueur=htmlentities($_POST['f_joueur']);
		require('views/user.login.phtml');
	}
	else 
	{
		if ($data['password'] == md5($password))
		{
			$_SESSION['joueur'] = mysqli_real_escape_string($db, $_POST['f_joueur']);
			$req="INSERT INTO t_game(name1,name2) VALUES('".$_SESSION['joueur']."','computer')";
			mysqli_query($db, $req);
			$_SESSION['partie']=mysqli_insert_id($db);
			require("apps/content.php");
			//header("location: index.php?page=content");	
		}
		else
		{
			$joueur= mysqli_real_escape_string($db, $_POST['f_joueur']);
			$error = 'Mot de passe incorrect';
			require('views/user.login.phtml');
		}
	}
}
	

else if(isset($_POST['f_joueur'], $_POST['f_password'], $_POST['f_btn_connexion'], $_POST['f_email']))
{
	$joueur = mysqli_real_escape_string($db, $_POST['f_joueur']);
	$password = mysqli_real_escape_string($db, $_POST['f_password']);
	$email = mysqli_real_escape_string($db, $_POST['f_email']);
	$joueur = mysqli_real_escape_string($db, $joueur);
	$email = mysqli_real_escape_string($db, $email);
	$pv = 1500;
	$agilite = 100;
	$force = 100;
	$armure = 100;

	$requete = "INSERT INTO t_joueur (nom, arme, password, email, pv, armure, agility, strength ) VALUES('".$joueur."', 'clear', '".md5($password)."', '".$email."', '".$pv."', '".$agilite."', '".$force."','".$armure."')";
	mysqli_query($db, $requete);
	$_SESSION['joueur'] = mysqli_real_escape_string($db, $_POST['f_joueur']);
	$req="INSERT INTO t_game(name1,name2) VALUES('".$_SESSION['joueur']."','computer')";
	mysqli_query($db, $req);
	$_SESSION['partie']=mysqli_insert_id($db);
	require("apps/content.php");
	//header("location: index.php?page=content");
}

else 
	require('views/user.login.phtml');

