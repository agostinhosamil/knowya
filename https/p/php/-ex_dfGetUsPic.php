<?php

	(isset($nwf) && is_object($nwf) && defined("__USER__")) or die("ERROR, can not use this file");

	$user_datas = user_get_datas(__USER__, "pic");

	$user_pic = (isset($user_datas->pic) && !empty($user_datas->pic)) ? __PPATH__."/".$user_datas->pic : "http://localhost/blog/https/im/JWnJbks.jpg";

	echo __PURL__.'?ref_type=ImVwr&src='.urlencode($user_pic).'&width=30&height=30&ref=non-XU&refid=U';