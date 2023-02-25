<div id="header">
	<div class="hdr">
		<div class="-hdr">
			<div class="hdr-a">
				<li class="hdr-a-a">
					<h2 class="hdr-a-a-a"><?php echo (isset($INIF["BLOG"])) ? $INIF["BLOG"] : "";?></h2>
				</li>
			</div>
			<div class="hdr-b">
				<ul class="hdr-b-a">
					<li class="hdr-b-a-a">
						<a href="<?php echo _UR_;?>home.php" class="hdr-b-a-a-a">P&#xe1;gina inicial</a>
					</li>
					<li class="hdr-b-a-a">
						<a href="<?php echo (is_object(user_get_datas(__USER__, "web_addr"))) ? _UR_.strtolower(user_get_datas(__USER__, "web_addr")->web_addr)."/" : "L";?>" class="hdr-b-a-a-a">Meu Perfil</a>
					</li>
					<li class="hdr-b-a-a">
						<a href="<?php echo _UR_;?>videos/" class="hdr-b-a-a-a">Vídeos</a>
					</li>
					<li class="hdr-b-a-a">
						<a href="<?php echo _UR_;?>photos/" class="hdr-b-a-a-a">Fotos</a>
					</li>
					<li class="hdr-b-a-a">
						<a href="<?php echo _UR_;?>hashtags/" class="hdr-b-a-a-a">Hashtags</a>
					</li>
					<li class="hdr-b-a-a">
						<a href="<?php echo _UR_;?>othermnoptions/" class="hdr-b-a-a-a">Mais</a>
					</li>
				</ul>
			</div>
		</div>
		<?php
			if((isset($_Ref) && $_Ref = "_Sys-ReadURL" && is_object($_user_datas))){
				include (dirname(__FILE__)."/-ex_usprintprofilepic.php");
			} 
		?>
	</div>
</div>
