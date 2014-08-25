<?php

$vic="UPDATE t_joueur SET victoire=victoire+1, arme='clear', pv=1500, armure=100, agility=100, strength=100 WHERE nom='".$_SESSION['joueur']."'";
mysqli_query($db,$vic);
$def="UPDATE t_joueur SET defaite=defaite+1, arme='clear', pv=1500, armure=100, agility=100, strength=100 WHERE id=1 ";
mysqli_query($db,$def);
	
$requete="SELECT nom, arme FROM t_joueur WHERE nom='".$_SESSION['joueur']."'";
$res=mysqli_query($db,$requete);

while($winner=mysqli_fetch_assoc($res))
{
	require('views/winner.phtml');				
}
require('views/replay.phtml');