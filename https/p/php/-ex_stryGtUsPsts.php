<?php 

	(isset($nwf) && is_object($nwf) && defined("__USER__")) or die("ERROR, can not use this file");

	(isset($post_datas) && is_object($post_datas)) or exit("No post selected");

	$us_id = ($post_datas->id_user);

	$ft_posts = $nwf->query("SELECT id FROM posts WHERE id_user = '$us_id' AND id != '$post_datas->id' ORDER BY id DESC LIMIT 3");

	if($ft_posts){

		while($row = $nwf->fetch($ft_posts)){

			$feed->nprint($row->id, false);

		}

	}else{

		echo "nao buscou posts";

	}