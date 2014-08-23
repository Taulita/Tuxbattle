<?php

$res = mysqli_query($db, "SELECT*FROM t_weapon WHERE type='sort'");
while ($weapon = mysqli_fetch_assoc($res))
{
	require('views/sort.phtml');
}
?>