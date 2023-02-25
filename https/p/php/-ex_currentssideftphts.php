<?php

	(isset($nwf) && is_object($nwf) && defined("__USER__")) or exit("FALHA...");

	$ft_phts = $nwf->query("SELECT id, name, post_id FROM images WHERE a = 'post' ORDER BY id DESC limit 3");

	if($ft_phts){

		if($nwf->rowCount($ft_phts) >= 1){

			while($row = $nwf->fetch($ft_phts)){

				echo '<div class="crrnts-a-b"><a href="#" class="crrnts-a-b-"><i class="crrnts-a-b-a" style="background-image:url('.__PPATH__.'/'.$row->name.'?ref_type=ImV&refid=0&ref=non)"></i></a></div>';

			}

		}else{

			echo "nao ha fotos recentes no BLOG, adicionar foto/s";

		}		

	}else{
		
		echo "NAo buscou fotos";

	}