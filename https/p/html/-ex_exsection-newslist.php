<div id="nwsl">
	<div class="nwsl">
	<?php 

		$ft_nws = $nwf->query("SELECT nid, user_id, resumo, title FROM news ORDER BY id DESC");

		if($ft_nws){

			if($nwf->rowCount($ft_nws) > 0){

				while($row = $nwf->fetch($ft_nws)){

					$user_name = explode(" ", user_get_datas($row->user_id, "name")->name)[ 0 ];

					echo '<div class="nwsl-a"><a class="nwsl-a-a" href="'._UR_.'news/feed/?nid='.$row->nid.'&ref_type=non-RF"><dl class="nwsl-a-a-a"><li class="nwsl-a-a-a-a"><h3 class="nwsl-a-a-a-a-a">'.base64_decode($row->title).'</h3></li><li class="nwsl-a-a-a-b"><span class="nwsl-a-a-a-b-a">'.base64_decode($row->resumo).'</span></li><li class="nwsl-a-a-a-b"><i class="nwsl-a-a-a-b-b">Publicado Ontem por '.$user_name.'</i></li></dl></a></div>';

				}

			}else{

				echo "NAo Ha noticias";

			}

		}else{

			echo "Nao selecionou";

		}


	?>
	</div>

</div>

<!--
<div class="nwsl-a">
			<a class="nwsl-a-a" href="">
				<dl class="nwsl-a-a-a">
					<li class="nwsl-a-a-a-a">
						<h3 class="nwsl-a-a-a-a-a">Titulo na noticia</h3>
					</li>
					<li class="nwsl-a-a-a-b">
						<span class="nwsl-a-a-a-b-a">Parte do conteudo Parte do conteudo Parte do conteudo Parte do conteudo Parte do conteudo Parte do conteudo Parte do conteudo Parte do conteudo Parte do conteudo Parte do conteudo </span>
					</li>
					<li class="nwsl-a-a-a-b">
						<i class="nwsl-a-a-a-b-b">Publicado Ontem por Agostinho</i>
					</li>
				</dl>
			</a>
		</div>

-->