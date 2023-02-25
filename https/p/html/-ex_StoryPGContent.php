<?php 

	(isset($nwf) && is_object($nwf) && defined("__USER__")) or die("ERROR, can not use this file");

	(isset($_GET["id"]) && !empty($_GET["id"]) && is_numeric($_GET["id"])) or exit("Not post selected");

	$id_post = stripslashes(trim($_GET["id"]));

	$post_datas = $feed->get_pdatas($id_post);

?>
<div id="StoryPGContent" class="strpgc">
	
	<div id="UsMStri" class="UsMStri">
		<div class="UsMStri-a">Mais posts de <?php echo (is_string(explode(" ", user_get_datas($post_datas->id_user, "name")->name)[ 0 ])) ? explode(" ", user_get_datas($post_datas->id_user, "name")->name)[ 0 ] : "";?></div>

		<?php 
			include_once (dirname(dirname(__FILE__))."/php/-ex_stryGtUsPsts.php");
		?>

	</div>

	<div class="strpgc-a">
	<?php 
		include_once (dirname(dirname(__FILE__))."/php/-ex_stryGtPostC.php");
	?>
	<div class="strpgc-a-a">
		<div class="strpgc-a-a-a">
			<li class="strpgc-a-a-a-a">
				<a href="" class="strpgc-a-a-a-a-a">Ver mais</a>
			</li>
		</div>
		<?php
			include (dirname(dirname(__FILE__))."/php/-ex_stryGtPostComments.php"); 
		?>
		
		<div class="strpgc-a-a-c">
			<form method="post" action="<?php echo $_SERVER["REQUEST_URI"];?>">
				<div class="strpgc-a-a-c-a">
					<div class="strpgc-a-a-c-a-a">
						<img width="30" height="30" src="<?php require (dirname(dirname(__FILE__))."/php/-ex_dfGetUsPic.php");?>">
					</div>
					<div class="strpgc-a-a-c-a-b">
						<div class="strpgc-a-a-c-a-b-a">
							<textarea class="strpgc-a-a-c-a-b-a-a" name="-x_commentc"></textarea>
						</div>
					</div>
					<div class="strpgc-a-a-c-a-c">
						<li class="strpgc-a-a-c-a-c-a">
							<button class="strpgc-a-a-c-a-c-a-a" name="-x_comment" type="submit">Comentar</button>
						</li>
					</div>
				</div>
			</form>
		</div>
			


	</div>

	</div>


</div>

<!-- COMM 

<div id="comentario" class="strpgc-a-a-b">
			<div class="strpgc-a-a-b-a">
				<div class="strpgc-a-a-b-a-a">PIC</div>
				<div class="strpgc-a-a-b-a-b">
					<dl class="strpgc-a-a-b-a-b-a">
						<li class="strpgc-a-a-b-a-b-a-a">
							<a href="" class="strpgc-a-a-b-a-b-a-a-a">Agostinho Sambo</a>
						</li>
						<li class="strpgc-a-a-b-a-b-a-b">
							<span class="strpgc-a-a-b-a-b-a-b-a">Ola mundo, comentario</span>
						</li>
						<dt class="strpgc-a-a-b-a-b-a-c">
							<li class="strpgc-a-a-b-a-b-a-c-a">
								<a href="" class="strpgc-a-a-b-a-b-a-c-a-a">Gosto</a>
							</li>
						</dt>
					</dl>
				</div>
			</div>
		</div>

-->