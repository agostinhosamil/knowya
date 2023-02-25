<?php

	(isset($nwf) && is_object($nwf) && defined("__USER__")) or die("ERROR, can not use this file");

	(isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) or exit("Not post selected");

	$POST = (isset($_POST["-x_comment"])) ? "ok" : undefined;

	if(!is_undefined($POST)){

		$id = stripslashes(trim($_GET["id"]));

		$us = __USER__;

		$now = Agora( null );

		$content = (isset($_POST["-x_commentc"]) && !empty($_POST["-x_commentc"])) ? base64_encode($_POST["-x_commentc"]) : null;

		$insert = $nwf->query("INSERT INTO comments (id_post, id_user, content, data) VALUES ('$id', '$us', '$content', '$now')");

		if(!$insert){

			echo 'Nao insere';

		}else{

			header("location: ".$_SERVER["REQUEST_URI"]);

		}

	}