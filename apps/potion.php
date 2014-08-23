<?php

$res = mysqli_query($db, "SELECT*FROM t_weapon WHERE type='potion'");
while ($weapon = mysqli_fetch_assoc($res))
{
	require('views/potion.phtml');
}
?>