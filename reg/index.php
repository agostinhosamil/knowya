<?php 
	include_once (dirname(dirname(__FILE__))."/https/p/php/-ex_Conf.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Criar conta no meu BLOG</title>

	<?= stylesheets() ?>
	<link rel="stylesheet" type="text/css" href="<?php echo _UR_;?>https/css/EkskklwlbkKmwk.css">
	
	<style type="text/css">
		#AreaLg {
			height:640px !important;
		}
		
		.AreaLg-a-a {
			margin-top:-60px !important;
		}
	</style>

</head>
<body>
<div id="bg"></div>
<?php 
	include_once (dirname(dirname(__FILE__))."/https/p/php/-ex_makeReg.php");
?>
<div id="contain">
	<div id="AreaLg">
		<div class="AreaLg-a">
			<div class="AreaLg-a-a">U</div>
		</div>
		<div class="AreaLg-b">
			<form method="post" action="<?php echo _UR_;?>reg/">
				<li class="AreaLg-b-a">
					<h2>Criar conta no&nbsp;<?php echo (isset($INIF["BLOG"])) ? $INIF["BLOG"] : "";?></h2>
				</li>
				<div class="AreaLg-b-b">
					<label for="name"><span class="AreaLg-b-b-a">Nome&nbsp;<?php if(isset($_POST["error_nameEmpty"]) && is_string($_POST["error_nameEmpty"])){ echo $_POST["error_nameEmpty"];}elseif(isset($_POST["error_unrname"]) && is_string($_POST["error_unrname"])){ echo $_POST["error_unrname"];}?></span></label>
					<input <?php echo (isset($_POST["name"])) ? 'value="'.$_POST["name"].'"' : ""; ?> type="text" name="name" class="AreaLg-b-b-b" id="name">
				</div>
				<div class="AreaLg-b-b">
					<label for="email"><span class="AreaLg-b-b-a">Email&nbsp;<?php if(isset($_POST["error_emailEmpty"]) && is_string($_POST["error_emailEmpty"])){ echo $_POST["error_emailEmpty"];}elseif(isset($_POST["error_unremail"]) && is_string($_POST["error_unremail"])){ echo $_POST["error_unremail"];}?></span></label>
					<input <?php echo (isset($_POST["email"])) ? 'value="'.$_POST["email"].'"' : ""; ?> type="text" name="email" class="AreaLg-b-b-b" id="email">
				</div>
				<div class="AreaLg-b-b">
					<label for="senha"><span class="AreaLg-b-b-a">Senha&nbsp;<?php if(isset($_POST["error_passEmpty"]) && is_string($_POST["error_passEmpty"])){ echo $_POST["error_passEmpty"];}elseif(isset($_POST["error_wrongpass"]) && is_string($_POST["error_wrongpass"])){ echo $_POST["error_wrongpass"];}?></span></label>
					<input type="password" name="pass" class="AreaLg-b-b-b" id="senha">
				</div>
				<div class="AreaLg-b-b">
					<label for="senha-"><span class="AreaLg-b-b-a">Senha&nbsp;<?php if(isset($_POST["error_npassEmpty"]) && is_string($_POST["error_npassEmpty"])){ echo $_POST["error_npassEmpty"];}elseif(isset($_POST["error_wrongnpass"]) && is_string($_POST["error_wrongnpass"])){ echo $_POST["error_wrongnpass"];}?></span></label>
					<input type="password" name="pass_" class="AreaLg-b-b-b" id="senha-" placeholder="Repita a sua senha">
				</div>
				<div class="AreaLg-b-b">
					<label for="auto_login">
						<acronym class="AreaLg-b-b-a-a">
							<input type="checkbox" name="autoLogin" id="auto_login" checked="true">
						</acronym>
						<span class="AreaLg-b-b-a_">Iniciar sessao autom&#xe1;ticamente</span>
					</label>
				</div>

				<div class="AreaLg-b-b">
					<input type="submit" name="reg" class="AreaLg-b-b-b_" value="Criar conta" id="login">
					<acronym class="AreaLg-b-b-b_a"><a class="AreaLg-b-b-b_a-a" href="<?php echo _UR_;?>?ref=Index&ref_type=iniUsing">Iniciar sess&#xe3;o</a></acronym>
				</div>
			</form>

		</div>

	</div>
</div>

</body>
</html>