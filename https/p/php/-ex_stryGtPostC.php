<?php 

	(isset($nwf) && is_object($nwf) && defined("__USER__")) or die("ERROR, can not use this file");

	(isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) or exit("Not post selected");

	$id = stripslashes(trim($_GET["id"]));

	$feed->nprint($id, true, true);