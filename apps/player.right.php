<?php

$req = "SELECT * FROM t_joueur
		WHERE id =1 ";	
$res = mysqli_query($db,$req);
$data = mysqli_fetch_assoc($res);


require("views/player.right.phtml");



?>