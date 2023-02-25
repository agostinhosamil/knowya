<?php
	(isset($nwf) && is_object($nwf) && defined("__USER__")) or exit("ERROR ");

	(isset($_GET["nid"]) && !empty($_GET["nid"])) or die("Se dados...");

	$nid = stripcslashes(trim($_GET["nid"]));

	$ft_nws = $nwf->query("SELECT *FROM news WHERE nid = '$nid'");

	if ($ft_nws) {

		if ($nwf->rowCount ($ft_nws) > 0) {

			$nwsDATAS = $nwf->fetch ($ft_nws, "OBJ");

		} else {
			exit("Noticia nao existe");
		}

	} else {
		exit("Nao buscou");
	}
?>

<div id="nwsl">
	<div class="nwslA">
		<div class="nws-head">
			<li class="nws-head-a">
				<h3 class="nws-title"><?php echo (isset($nwsDATAS->title)) ? base64_decode($nwsDATAS->title) : undefined;?></h3>
			</li>
			<li class="nws-head-b">
				<span class="nws-head-b-a">
					<?php echo (isset($nwsDATAS->user_id)) ? "Publicado por ".explode(" ", user_get_datas($nwsDATAS->user_id, "name")->name)[ 0 ]."&nbsp;●&nbsp;".date_read($nwsDATAS->data) : undefined; ?>
				</span>
			</li>	
		</div>
		<div class="nws-body">
			<div class="nws-body-a">
				<?php echo (isset($nwsDATAS->content)) ? $feed->nwsbd_tagsRead(considere_specialchars(tags_encode(base64_decode($nwsDATAS->content)))) : undefined;?>
			</div>
		</div>
	</div>
</div>
