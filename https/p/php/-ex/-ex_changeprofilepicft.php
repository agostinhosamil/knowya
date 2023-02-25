<?php 

	(isset($nwf) && is_object($nwf) && defined("__USER__")) or exit("ERRO...");

	$cmpsr_sub = (isset($_POST["sendim"])) ? "true" : undefined;

	if(!is_undefined($cmpsr_sub)){

		if(isset($_FILES["npic"]) && is_string($_FILES["npic"]["name"])){

			$profile_pic = images_upload($_FILES["npic"]);

			if(is_string($profile_pic)){

				$profile_pic = json_decode($profile_pic);

				if(count($profile_pic) == 0){
					die("O que?");
				}else{

					$p_pic = $profile_pic[ 0 ];

					images_save($p_pic, __USER__);

					$usid = __USER__;

					$update = $nwf->query("UPDATE users SET pic = '$p_pic' WHERE id = '$usid'");

					if($update){

						echo "OBA";

					}else{

						echo "Nao atualizou";

					}


				}


			}else{

				echo "ERROR, Mauzinho";

			}

		}else{

			echo '<div class="errorif">Desculpe, n&#xe3;o percebemos bem mas alguma coisa n&#xe3;o correu como previsto. Por favor tente recaregar esta p&#xe1;gina para realizar esta a&#xe7;&#xe3;o.</div>';

		}

	}