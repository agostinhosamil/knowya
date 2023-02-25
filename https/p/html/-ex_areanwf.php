<?php 

	
	$pg = (isset($_GET["p"]) && !empty($_GET["p"]) && is_int((int)$_GET["p"])) ? (int)$_GET["p"] : 1;

	$max = 15;

	$p = (($pg * $max) - $max);

	$imprimidos = 0;
	$restante = null;
	$infinite = (999999999999);

	$cmd = (isset($_Ref) && $_Ref = "_Sys-ReadURL" && is_object($_user_datas)) ? "WHERE id_user = '$_user_datas->id'" : "";

	$ft_posts = $nwf->query("SELECT id FROM posts $cmd ORDER BY id DESC LIMIT $p, $max");
	$ft_whole_posts = $nwf->query("SELECT id FROM posts $cmd LIMIT $p, $max");

	if($ft_posts){

		if($nwf->rowCount($ft_posts) == 0){
			echo "Sem posts recentes";
		}else{

			while($row = $nwf->fetch($ft_posts)){

				$feed->nprint($row->id);

				$imprimidos++;

			}

			$restante = ceil(($nwf->rowCount($ft_whole_posts)) - $imprimidos);


			if($restante > 0){

				echo '<div id="Topo-feed"><a href="'._UR_.'home.php?idus='.$_USER_.'&p='.($pg + 1).'&ref_type=pgnation&ref=_HomeFd"><li class="text">Ver Mais posts</li></a></div>';

			}else{

				echo '<div id="Topo-feed"><li class="text">Fim dos resultados&nbsp;<a href="'._UR_.'home.php?idus='.$_USER_.'&p='.($pg - 1).'&ref_type=pgnation&ref=_HomeFd" class="Topo-feed-a"><</a></li></div>';

			}

			echo $imprimidos."<br/>".$restante;

		}

	}else{

		echo "Nao buscou posts";

	} 


	















/*

<div id="Post_" class="postagem l">
	<div class="m">
		<div class="n">
			<img src="//localhost/imlib/-net/https/www/im/a.jpg" class="o p">
		</div>
		<dl class="q">
			<li class="r">
				<a href="">Agostinho sambo</a>
			</li>
		</dl>
	</div>
	<div class="conteudo_post">
		<li class="s">
			<span class="t u">Ola mundo como vai por ai ei</span>
			<figure class="v">
				<img src="//localhost/imlib/-net/https/www/im/c.jpg" class="w">
			</figure>
		</li>
	</div>
	<div class="opcoes_post">
		<ul class="x">
			<li class="y">
				<a href="" class="z">Gosto</a>
			</li>
			<li class="y">
				<a href="story.php?id=<?php echo $i;?>" class="z">Comentar</a>
			</li>
			<li class="y">
				<a href="" class="z">Guardar</a>
			</li>
			<li class="y">
				<a href="" class="z">Mais u</a>
			</li>
		</ul>
	</div>


</div>

*/