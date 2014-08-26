<?php
	$server = "localhost";
	$db_name = "tuxbattle";
	$user = "root";
	$password = "troiswa";


	$db = mysqli_connect($server, $user, $password, $db_name) or die ('<h1 style="font-family: sans-serif; font-size: 16pt; text-align: center; border: 4px solid #FF0000; padding: 16px; width: 400; margin: 0 auto; border-radius: 32px; background-color: #FFC0C0; margin-top: 128px; color: #FF0000;">Erreur : Connexion &agrave; la base de donn&eacute;es impossible</h1>');

	$titre_application      = "The Tux Battle !";
	$version                = "0.00.001";
	
	/* Team development */
	$developpeur1           = "Audrey";
	$developpeur1_site      = "";
	$developpeur1_site_name = "";

	$developpeur2           = "Armand";
	$developpeur2_site      = "www.armand-sahetchian.fr";
	$developpeur2_site_name = "Armand Sahetchian";

	$developpeur3           = "Stephan";
	$developpeur3_site      = "www.alternetive.fr";
	$developpeur3_site_name = "@lternetive!&trade;";

	$developpeur4           = "Thomas";
	$developpeur4_site      = "";
	$developpeur4_site_name = "";

	$compagnie_name         = "3W Academy";
	$compagnie_site         = "www.3wa.fr";
	$compagnie_site_name    = "3w Academy";
	$compagnie_promo        = "3W Academy Promo 24";
?>
