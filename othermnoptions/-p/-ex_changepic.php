<div id="sidebar">
	<div class="sdbr_b">
		<?php 
			include (dirname(dirname(dirname(__FILE__)))."/https/p/php/-ex/-ex_changeprofilepicft.php");
		?>
		<form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>" enctype="multipart/form-data">
			<li class="sdbr_b-a">
				<h3 class="sdbr_b-a-a">Atualizar foto de perfil</h3>
			</li>
			<li class="sdbr_b-b">
				<span class="sdbr_b-b-a">Escolha uma foto da tua biblioteca</span>
			</li>
			<div class="sdbr_b-c">
				<label class="sdbr_b-c-a" for="XPic">
					<input class="sdbr_b-c-a-a" name="npic" type="file" id="XPic" accept="image/jpeg">
					Selecionar
				</label>
			</div>
			<div class="sdbr_b-d">
				<input type="submit" name="sendim" value="Enviar" class="sdbr_b-d-a">
			</div>
		</form>

	</div>
</div>