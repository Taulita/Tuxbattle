<?php

$histo = array();
$res = mysqli_query($db, "SELECT * from t_histo LEFT JOIN t_game ON idgame = game WHERE idgame = '".$_SESSION["partie"]."' ORDER BY id DESC");

while ($data = mysqli_fetch_assoc($res))
{
	$histo = $data;
	$ligne = $histo['nom1']." prend son arme <strong>".$histo['arme1']."</strong>  et inflige ". $histo['damage']. "pt(s) de dégats à ".$histo['nom2'].". <br>
	Potion: ".$histo['potion1'].". <br> 
	Sort:". $histo['sort1'].". ";
	require('views/game.phtml');
}
