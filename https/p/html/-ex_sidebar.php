<div id="sidebar">
  
  <?= partial('hashtags') ?>

	<?= partial('sdbrareanwsget', ['nwf' => $nwf]) ?>
  
	<div class="sdbr-c">
		<div class="sdbr-c-a">
			<ul class="sdbr-c-a-a">
				<li class="sdbr-c-a-a-a">
					<a class="sdbr-c-a-a-a-a" href="">Definicoes</a>
				</li>
				<li class="sdbr-c-a-a-a">
					<a class="sdbr-c-a-a-a-a" href="<?php echo (defined("_UR_")) ? _UR_ : "";?>about/">Sobre</a>
				</li>
				<li class="sdbr-c-a-a-a">
					<a class="sdbr-c-a-a-a-a" href="<?php echo (defined("_UR_")) ? _UR_ : "";?>photos/">Fotos</a>
				</li>
				<li class="sdbr-c-a-a-a">
					<a class="sdbr-c-a-a-a-a" href="<?php echo (defined("_UR_")) ? _UR_ : "";?>videos/">V&#xed;deos</a>
				</li>
				<li class="sdbr-c-a-a-a">
					<a class="sdbr-c-a-a-a-a" href="<?php echo (defined("_UR_")) ? _UR_ : "";?>news/feed/createnews/">Publicar nit&#xed;cia</a>
				</li>
				
			</ul>
			<ul class="sdbr-c-a-a">
				<li class="sdbr-c-a-a-a">
					<a class="sdbr-c-a-a-a-a" href="<?php echo (defined("_UR_")) ? _UR_ : "";?>a/logout.php">Terminar sess&#xe3;o [<?php echo explode(" ", trim(user_get_datas(__USER__, "name")->name))[ 0 ];?>]</a>
				</li>
			</ul>
		</div>
		<div class="sdbr-c-b">
			<li class="sdbr-c-b-a">
				<?php echo (isset($INIF["BLOG"])) ? $INIF["BLOG"]."&nbsp;&copy;".date("Y") : ""; ?>
			</li>
		</div>

	</div>
</div>
