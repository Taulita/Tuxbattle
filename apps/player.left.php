<?php

$req = "SELECT * FROM t_joueur
		WHERE nom = '".$_SESSION['joueur']."'";		
$res = mysqli_query($db,$req);
$data = mysqli_fetch_assoc($res);
require("views/player.left.phtml");
	


?>