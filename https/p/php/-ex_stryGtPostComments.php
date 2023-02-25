<?php

	(isset($nwf) && is_object($nwf) && defined("__USER__")) or die("ERROR, can not use this file");

	(isset($post_datas) && is_object($post_datas)) or exit("No post selected");

	$ft_cms = $nwf->query("SELECT id FROM comments WHERE id_post = '$post_datas->id'");

	if($ft_cms){

		if($nwf->rowCount($ft_cms) >= 1){

			while($row = $nwf->fetch($ft_cms)){

				$feed->cprint($row->id);

			}

		}

	}else{

		echo 'Did not fetch comments';

	}