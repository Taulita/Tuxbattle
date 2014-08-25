<?php
if(isset($_POST['logout']))
{
	$ab="UPDATE t_joueur SET arme='clear', pv=1500, armure=100, agility=100, strength=100 WHERE nom='".$_SESSION['joueur']."'";
	mysqli_query($db,$ab);
	$vic="UPDATE t_joueur SET arme='clear', pv=1500, armure=100, agility=100, strength=100 WHERE id=1 ";
	mysqli_query($db,$vic);
	session_destroy(); 
	$_SESSION=array();
	require("apps/user.login.php");
}

//Preparation des Combattants
$joueur=$_SESSION['joueur'];
$res = mysqli_query($db, "SELECT * FROM t_joueur WHERE nom = '".$joueur."'");
$player1 = mysqli_fetch_object($res, "Combattant");
$res2 = mysqli_query($db, "SELECT * FROM t_joueur WHERE id =1");
$player2 = mysqli_fetch_object($res2, "Combattant");

//Definir la partie en cours
$idgame=$_SESSION['partie'];

//Definir $section par default
$section="playerTurn";

if($player1->isAlive() && $player2->isAlive())
{
	
	if(isset($_POST['f_arme'])||isset($_POST['ok']))
	{
		//Enregistrer les choix du Player et ses consequences
		if(isset($_POST['f_arme']))
		{
			$idArme= $_POST['f_arme'];		
			$res = mysqli_query($db, "SELECT * FROM t_weapon WHERE id_weapon='".$idArme."'");
			$arme = mysqli_fetch_object($res, "Arme");
	
			if (isset($_POST['f_potion']))
			{
				$idPotion=$_POST['f_potion'];
				$res = mysqli_query($db, "SELECT * FROM t_weapon WHERE id_weapon='".$idPotion."'");
				$potion = mysqli_fetch_object($res, "Potion");	
			}
			else
				$potion = new Potion();
	
			if (isset($_POST['f_sort']))
			{
				$idSort= $_POST['f_sort'];
				$res = mysqli_query($db, "SELECT * FROM t_weapon WHERE id_weapon='".$idSort."'");
				$sort = mysqli_fetch_object($res, "Sort");
			}
			else
				$sort = new Sort();
			
			$player1->setArsenal($arme, $potion, $sort);
			$player1->taper($player2);
			$player=$player1->getPlayer();
			$enemy=$player1->getEnnemy($player2);
			$section="computerTurn";
		}

		//Definir et enregistrer les choix du Computer et ses consequences
		else
		{
			$idArme= rand(1,3);
			$idPotion=rand(4,10);
			$idSort=rand(7,12);
	
			$res = mysqli_query($db, "SELECT * FROM t_weapon WHERE id_weapon='".$idArme."'");
			$arme = mysqli_fetch_object($res, "Arme");		
			
			if ($idPotion>=7)
				$potion = new Potion;
			else
			{
				$res = mysqli_query($db, "SELECT * FROM t_weapon WHERE id_weapon='".$idPotion."'");
				$potion = mysqli_fetch_object($res, "Potion");
			}
			
			if ($idSort>=9)
				$sort = new Sort;
			else
			{
				$res = mysqli_query($db, "SELECT * FROM t_weapon WHERE id_weapon='".$idSort."'");
				$sort = mysqli_fetch_object($res, "Sort");
			}		
			
			$player2->setArsenal($arme, $potion, $sort);
			$player2->taper($player1);
			$player=$player2->getPlayer();
			$enemy=$player2->getEnnemy($player1);
			$section="playerTurn";
		}

		// Rentrer les informations dans la BD.
		$req = "INSERT INTO t_histo(id1, nom1, arme1, potion1, sort1, message1, damage, id2, nom2, message2, game)
		VALUES ('".$player['id']."','".$player['nom']."','".$player['arme']."','".$player['potion']."',
				'".$player['sort']."','".$player['message']."','".$player['damage']."','".$enemy['id']."',
				'".$enemy['nom']."','".$enemy['message']."','".$idgame."')";
		mysqli_query($db, $req);
		$req="UPDATE t_joueur SET pv='".$player['pv']."', armure='".$player['armure']."', agility= '".$player['agility']."', 
			strength='".$player['strength']."', arme='".$player['arme']."' 
			WHERE id='".$player['id']."'";
		mysqli_query($db,$req);
	
		$req="UPDATE t_joueur SET pv='".$enemy['pv']."', armure='".$enemy['armure']."', agility= '".$enemy['agility']."', strength='".$enemy['strength']."' 
			WHERE id='".$enemy['id']."'";
		mysqli_query($db,$req);
		if(!($player1->isAlive()))
			$section="looser";
		else if(!($player2->isAlive()))
			$section="winner";
	}
}

require("views/content.phtml");		
?>