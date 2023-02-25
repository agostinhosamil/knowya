<?php

	include_once (dirname(dirname(__FILE__))."/https/p/php/-ex_Conf.php");

	(isset($nwf) && is_object($nwf) && defined("__USER__")) or exit("ERROR GRAVE...");

	$ars = array("post", "comment");

	if(isset($_GET["id"]) && !empty($_GET["id"]) && isset($_GET["-a"]) && !empty($_GET["-a"]) && in_array($_GET["-a"], $ars) && isset($_SERVER["HTTP_REFERER"])){

		$pid = (int)strip_tags(stripcslashes(trim($_GET["id"])));
		$a = strip_tags(stripcslashes(trim($_GET["-a"])));
		$us = __USER__;

		$ft_post = $nwf->query("SELECT id FROM posts WHERE id = '$pid'");

		if($ft_post){

			if($nwf->rowCount($ft_post) > 0){

				$ft_like = $nwf->query("SELECT id FROM likes WHERE id_user = '$us' AND id_post = '$pid' AND a = '$a'");

				if($ft_like){

					if(!($nwf->rowCount($ft_like) <= 0)){

						$like = $nwf->query("DELETE FROM likes WHERE id_user = '$us' AND id_post = '$pid' AND a = '$a'");

							if($like){

								switch($a){

									case "post":

										$update = $nwf->query("UPDATE posts SET likes = likes-1 WHERE id = '$pid'");

										if($update){
											header("location: ".$_SERVER["HTTP_REFERER"]."");
										}else{
											echo "Did not update";
										}

									break;

									case "comment":

										$update = $nwf->query("UPDATE comments SET likes = likes-1 WHERE id = '$pid'");

										if($update){
											header("location: ".$_SERVER["HTTP_REFERER"]."");
										}else{
											echo "Did not update";
										}

									break;

								}

							}else{

								echo "Nao insere like";

							}

					}else{

						echo "Voce Ja curtiu este post";

					}

				}else{

					echo "NAO verfificou";

				}

			}else{

				echo "Post Nao existe";

			}

		}else{

			echo "NAO buscou post";

		}


	}else{

		header("location: "._UR_."");

	}