<?php
$error = "";
$joueur = $_SESSION["joueur"];

$res = mysqli_query($db, "SELECT * FROM t_joueur WHERE nom = '".$joueur."'");
$player1 = mysqli_fetch_object($res, "Combattant");

$test = $player1 -> getPlayer();

$res = mysqli_query($db, "SELECT * FROM t_joueur WHERE id =1");
$player2 = mysqli_fetch_object($res, "Combattant");

if(isset($_POST['ok']))
{


	$idArme= rand(1,3);
	$idPotion=rand(4,6);
	$idSort=rand(6,8);

	$res = mysqli_query($db, "SELECT * FROM t_weapon WHERE id_weapon='".$idArme."'");
	while ($proprieteArme = mysqli_fetch_assoc($res))
	{	
		$player2->setArme($proprieteArme);			
	}

	$res = mysqli_query($db, "SELECT * FROM t_weapon WHERE id_weapon='".$idPotion."'");
	while ($proprietePotion = mysqli_fetch_assoc($res))
	{
		$player2->setPotion($proprietePotion);	
	}

	$res = mysqli_query($db, "SELECT * FROM t_weapon WHERE id_weapon='".$idSort."'");
	while ($proprieteSort = mysqli_fetch_assoc($res))
	{
		$player2->setSort($proprieteSort);	
	}

	$player2->taper($player1);
	$player=$player2->getPlayer();
	$enemy=$player2->getEnemy($player1);

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

	
	$req = "UPDATE t_joueur SET 
		pv='".$player['pv']."',
		armure='".$player['armure']."',
		agility='".$player['agility']."', 
		strength='".$player['force']."', 
		arme='".$player['arme']."' 
		WHERE
		id='".$player['id']."'";

	mysqli_query($db, $req);

	mysqli_query($db, "UPDATE t_joueur SET
		pv='".$enemy['pv']."', 
		armure='".$enemy['armure']."', 
		agility= '".$enemy['agility']."', 
		strength='".$enemy['force']."' 
		WHERE
		id='".$enemy['id']."'");
	require("views/preparation.phtml");
	
}
else{
	require("views/preparation.phtml");
}





?>