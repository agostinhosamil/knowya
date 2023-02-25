<?php 

(isset($nwf) && is_object($nwf) && defined("__USER__")) or exit("ERRO...");

$ft_nws = $nwf->query("SELECT id, summary FROM news ORDER BY id DESC LIMIT 15");

if ($ft_nws) {

	if ($nwf->rowCount($ft_nws) >= 1) {

		$news = [];

		while ($row = $nwf->fetch($ft_nws)) {
			array_push ($news, $row);
			// echo '<a href="'._UR_.'news/feed/?nid='.$row->nid.'&ref_type=non-RF" class="sdbr-b-a"><li class="sdbr-b-a-a"><span class="sdbr-b-a-a-a">'.base64_decode($row->resumo).'</span></li></a>';
		}

		newsList($news);

	}

} else {

	echo "Nao buscou";

}