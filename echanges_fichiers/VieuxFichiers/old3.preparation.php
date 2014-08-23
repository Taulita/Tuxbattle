<?php
$joueur = $_SESSION["joueur"];

$res = mysqli_query($db, "SELECT * FROM t_joueur WHERE nom = '".$joueur."'");
$player1 = mysqli_fetch_object($res, "Combattant");
$test = $player1 -> getPlayer();
$res = mysqli_query($db, "SELECT * FROM t_joueur WHERE id =1");
$player2 = mysqli_fetch_object($res, "Combattant");

$req= mysqli_query($db, "SELECT idgame FROM t_game WHERE idgame='".$_SESSION['partie']."'");
$res = mysqli_fetch_assoc($req);
$idgame=$res['idgame'];


if($player1->isAlive() && $player2->isAlive())
{
	if(isset($_POST))
	{
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
		else if(isset($_POST['ok']))
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
			$section="computerTurn";
	
		}
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
	}
		


	

		$req = "INSERT INTO t_histo(id1, nom1, arme1, potion1, sort1,
				message1,
				damage,
				id2,
				nom2,
				message2,
				game )
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
				'".$enemy['message']."',
				'".$idgame."')";
		mysqli_query($db, $req);
		//var_dump($req);
		
		$req = "UPDATE t_joueur SET 
			pv='".$player['pv']."',
			armure='".$player['armure']."',
			agility='".$player['agility']."', 
			strength='".$player['strength']."', 
			arme='".$player['arme']."' 
			WHERE
			id='".$player['id']."'";
		//var_dump($req);
		mysqli_query($db, $req);

		$req ="UPDATE t_joueur SET
			pv='".$enemy['pv']."', 
			armure='".$enemy['armure']."', 
			agility= '".$enemy['agility']."', 
			strength='".$enemy['strength']."' 
			WHERE
			id='".$enemy['id']."'";

		//var_dump($req);
		$winner2=[$player['id'],$enemy['id']];
		mysqli_query($db,$req);

		
		else
			require("views/preparation.phtml");
	
	}

	else
		require("views/preparation.phtml");
}

/*else{


	if ($player1->isAlive())
	{
		$requete="UPDATE t_joueur SET victoire=victoire+1, pv=pv+1500, armure=100, agility=100, force=100 WHERE id='".$winner1[1]."'";
		var_dump($requete);
		//mysqli_query($db,$requete);
		$requete="UPDATE t_joueur SET defaite=defaite+1, pv=pv+1500, armure=100, agility=100, force=100 WHERE id='".$winner1[2]."'";
		var_dump($requete);
		//mysqli_query($db,$requete);
		$requete="SELECT nom, arme WHERE id='".$winner1[1]."'";
		var_dump($requete);
		while($winner=mysqli_query($db,$requete))
		{
			require('views/winner.phtml');
			
		}
		require('views/replay.phtml');
		
	}

	else if ($player2->isAlive())
	{
		$requete="UPDATE t_joueur SET defaite=defaite+1, pv=pv+1500, armure=100, agility=100, force=100 WHERE id='".$winner2[2]."'";
		var_dump($requete);
		//mysqli_query($db,$requete);
		$requete="UPDATE t_joueur SET victoire=victoire+1, pv=pv+1500, armure=100, agility=100, force=100 WHERE id='".$winner2[1]."'";
		var_dump($requete);
		//mysqli_query($db,$requete);
		$requete="SELECT nom, arme WHERE id='".$ennemy['id']."'";
		var_dump($requete);

		while($winner=mysqli_query($db,$requete))
		{
			require('views/loser.phtml');
			
		}
		require('views/replay.phtml');
	}

	else
	{
		$requete="UPDATE t_joueur SET pv=pv+1500, armure=100, agility=100, force=100 WHERE id='".$player['id']."'";
		var_dump($requete);
		//mysqli_query($db,$requete);
		$requete="UPDATE t_joueur SET pv=pv+1500, armure=100, agility=100, force=100 WHERE id='".$ennemy['id']."'";
		var_dump($requete);
		//mysqli_query($db,$requete);	
		require('views/matchnul.phtml');
		require('views/replay.phtml');

	}
}*/

		if (!($player2->isAlive()))
		{
			$requete="UPDATE t_joueur SET victoire=victoire+1, pv=1500, armure=100, agility=100, strength=100 WHERE id='".$player['id']."'";
			//var_dump($requete);
			mysqli_query($db,$requete);
			$requete="UPDATE t_joueur SET defaite=defaite+1, pv=1500, armure=100, agility=100, strenght=100 WHERE id='".$enemy['id']."'";
			//var_dump($requete);
			mysqli_query($db,$requete);
			$requete="SELECT nom, arme WHERE id='".$player['id']."'";
			var_dump($requete);
			while($winner=mysqli_query($db,$requete))
			{
				require('views/winner.phtml');
				
			}
			require('views/replay.phtml');
			
		}

		else if (!($player1->isAlive()))
		{
			$requete="UPDATE t_joueur SET defaite=defaite+1, pv=1500, armure=100, agility=100, force=100 WHERE id='".$player['id']."'";
			//var_dump($requete);
			mysqli_query($db,$requete);
			$requete="UPDATE t_joueur SET victoire=victoire+1, pv=1500, armure=100, agility=100, force=100 WHERE id='".$enemy['id']."'";
			//var_dump($requete);
			mysqli_query($db,$requete);
			$requete="SELECT nom, arme WHERE id='".$ennemy['id']."'";
			var_dump($requete);

			while($winner=mysqli_query($db,$requete))
			{
				require('views/loser.phtml');
				
			}
			require('views/replay.phtml');
		}
		else
		{
			
			require('views/ok.phtml');

		}

		if (!($player2->isAlive()))
		{
			$requete="UPDATE t_joueur SET victoire=victoire+1, pv=1500, armure=100, agility=100, strength=100 WHERE id='".$enemy['id']."'";
			//var_dump($requete);
			mysqli_query($db,$requete);
			$requete="UPDATE t_joueur SET defaite=defaite+1, pv=1500, armure=100, agility=100, strenght=100 WHERE id='".$player['id']."'";
			//var_dump($requete);
			mysqli_query($db,$requete);
			$requete="SELECT nom, arme WHERE id='".$enemy['id']."'";
			//var_dump($requete);

			while($winner=mysqli_fetch_assoc($requete))
			{
				require('views/winner.phtml');
				
			}
			require('views/replay.phtml');
			
		}

		else if (!($player1->isAlive()))
		{
			$requete="UPDATE t_joueur SET defaite=defaite+1, pv=1500, armure=100, agility=100, strength=100 WHERE id='".$enemy['id']."'";
			//var_dump($requete);
			mysqli_query($db,$requete);
			$requete="UPDATE t_joueur SET victoire=victoire+1, pv=1500, armure=100, agility=100, strength=100 WHERE id='".$player['id']."'";
			//var_dump($requete);
			mysqli_query($db,$requete);
			$requete="SELECT nom, arme WHERE id='".$player['id']."'";
			while($winner=mysqli_fetch_assoc($db,$requete))
			{
				require('views/loser.phtml');
				
			}
			require('views/replay.phtml');
		}

?>