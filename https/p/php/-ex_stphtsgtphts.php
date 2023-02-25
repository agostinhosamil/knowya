<?php 

	(isset($nwf) && is_object($nwf) && defined("__USER__")) or exit("FALHA...");

	$ft_phts = $nwf->query("SELECT id, name, post_id FROM images WHERE a = 'post' ORDER BY id DESC");

	if($ft_phts){

		if($nwf->rowCount($ft_phts) >= 1){

			while($row = $nwf->fetch($ft_phts)){

				$img = urlencode(__PPATH__."/".$row->name);
				
				list($width, $height) = getimagesize(urldecode($img));

				if($width >= 450){

					echo '<figure class="nwfd-a-a nwfd-im"><img class="nwfd-a-a-a" src="'.__PURL__.'?ref_type=non-EX&src='.$img.'&width=450&height=450&ref=0&ac=PhVwr" width="450" height="450"><figcaption class="nwfd-a-a-b">FOOTER</figcaption></figure>';

				}

	

			}

		}else{

			echo "nao ha fotos recentes no BLOG, adicionar foto/s";

		}		

	}else{
		
		echo "NAo buscou fotos";

	}