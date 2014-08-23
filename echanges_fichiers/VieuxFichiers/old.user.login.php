<?php

$db = mysqli_connect('localhost', 'root', 'troiswa', 'tuxbattle');

if(isset($_SESSION['joueur']))
{
	//require('index.php?page=content');
	$joueur = $_SESSION['joueur'];
	$req="INSERT INTO t_game(name1,name2) VALUES('".$_SESSION['joueur']."','computer')";
	mysqli_query($db, $req);
	$_SESSION['partie']=msqli_insert_id($db);

	header("location: index.php?page=content");

}

if (isset($_POST['f_joueur'], $_POST['f_password'], $_POST['f_btn_connexion']) && $_POST['f_email'] == "")
	{
	$joueur = $_POST['f_joueur'];
	$password = $_POST['f_password'];

	$res = mysqli_query($db, "SELECT * FROM t_joueur WHERE nom ='".$joueur."'");
	$data = mysqli_fetch_assoc($res);

	if ($data == NULL)
		{
		header("location: index.php?page=user.login");
		//require('views/user.login.phtml');
		}
	else 
	{
		if ($data['password'] == md5($password))
		{
			$_SESSION['joueur'] = $_POST['f_joueur'];
			$joueur = $_SESSION['joueur'];
			$req="INSERT INTO t_game(name1,name2) VALUES('".$_SESSION['joueur']."','computer')";
			mysqli_query($db, $req);
			$_SESSION['partie']=msqli_insert_id($db);

			header("location: index.php?page=content");
			
		}
		else
		{
		$error = 'Joueur/mot de passe incorrect';
		require('views/user.login.phtml');
		}
	}
}

	//----------------------------------------------------------------	

else if(isset($_POST['f_joueur'], $_POST['f_password'], $_POST['f_btn_connexion'], $_POST['f_email']))
	{
	$joueur = $_POST['f_joueur'];
	$password = $_POST['f_password'];
	$email = $_POST['f_email'];
	$joueur = mysqli_real_escape_string($db, $joueur);
	$email = mysqli_real_escape_string($db, $email);
	$pv = 1500;
	$agilite = 100;
	$force = 100;
	$armure = 100;

	$requete = "INSERT INTO t_joueur (nom, password, email, pv, armure, agility, strength ) VALUES('".$joueur."', '".md5($password)."', '".$email."', '".$pv."', '".$agilite."', '".$force."','".$armure."')";
	mysqli_query($db, $requete);

	$_SESSION['joueur'] = $_POST['f_joueur'];
	$req="INSERT INTO t_game(name1,name2) VALUES('".$_SESSION['joueur']."','computer')";
	mysqli_query($db, $req);
	$_SESSION['partie']=msqli_insert_id($db);
	header("location: index.php?page=content");

}
else {
require('views/user.login.phtml');
}
