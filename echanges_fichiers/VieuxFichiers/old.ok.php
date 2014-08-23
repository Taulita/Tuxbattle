<?php

$joueur = $_SESSION["joueur"];
$res = mysqli_query($db, "SELECT * FROM t_joueur WHERE nom = '".$joueur."'");
$player1 = mysqli_fetch_object($res, "Combattant");
$res = mysqli_query($db, "SELECT * FROM t_joueur WHERE id = '1'");
$player2 = mysqli_fetch_object($res, "Combattant");

if(isset($_POST['f_arme']))
{
	$idArme= $_POST['f_arme'];
	$idPotion=$_POST['f_potion'];
	$idSort= $_POST['f_sort'];

	$res = mysqli_query($db, "SELECT * FROM t_weapon WHERE id_weapon='".$idArme."'");
	while ($proprieteArme = mysqli_fetch_assoc($res))
	{	
		$player1->setArme($proprieteArme);			
	}

	$res = mysqli_query($db, "SELECT * FROM t_weapon WHERE id_weapon='".$idPotion."'");
	while ($proprietePotion = mysqli_fetch_assoc($res))
	{
		$player1->setPotion($proprietePotion);	
	}

	$res = mysqli_query($db, "SELECT * FROM t_weapon WHERE id_weapon='".$idSort."'");
	while ($proprieteSort = mysqli_fetch_assoc($res))
	{
		$player1->setSort($proprieteSort);	
	}

	$player1->taper($player2);
	$player=$player1->getPlayer();
	var_dump($player);
	$enemy=$player1->getEnemy($player2);
	var_dump($enemy);
	$req = "INSERT INTO t_histo(
			id1,
			nom1,
			arme1,
			potion1,
			sort1,
			message1,
			damage,
			id2,
			nom2,
			message2 )
	VALUES (
			'".$player['id']."',
			'".$player['nom']."',
			'".$player['arme']."',
			'".$player['potion']."',
			'".$player['sort']."',
			'".$player['message']."',
			'".$player['damage']."',
			'".$enemy['id']."',
			'".$enemy['nom']."',
			'".$enemy['message']."')";
	mysqli_query($db, $req);
	$req="UPDATE t_joueur SET 
		pv='".$player['pv']."', 
		armure='".$player['armure']."', 
		agility= '".$player['agility']."', 
		strength='".$player['force']."', 
		arme='".$player['arme']."' 
		WHERE
		id='".$player['id']."'";
	var_dump($req);
	mysqli_query($db,$req);

	$req="UPDATE t_joueur SET
		pv='".$enemy['pv']."', 
		armure='".$enemy['armure']."', 
		agility= '".$enemy['agility']."', 
		strength='".$enemy['force']."' 
		WHERE
		id='".$enemy['id']."'";

	var_dump($req);	
	mysqli_query($db,$req);


	require('views/ok.phtml');


}
else
 $error="Vous n'avez pas choisi d'arme, vous ne pouvez pas jouer.";


