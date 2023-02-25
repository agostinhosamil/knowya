<?php 
	include_once (dirname(__FILE__)."/https/p/php/-ex_Conf.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Bem vindo ao meu BLOG</title>

	<?= stylesheets() ?>
	<link rel="stylesheet" type="text/css" href="<?php echo _UR_;?>https/css/EkskklwlbkKmwk.css">

</head>
<body>
<div id="bg"></div>
<?php 
	include_once (dirname(__FILE__)."/https/p/php/-ex_makeLogin.php");
?>
<div id="contain">
	<div id="AreaLg">
		<div class="AreaLg-a">
			<div class="AreaLg-a-a">U</div>
		</div>
		<div class="AreaLg-b">
			<form method="post" action="<?php echo _UR_;?>">
				<li class="AreaLg-b-a">
					<h2>Iniciar sessão no&nbsp;<?php echo (isset($INIF["BLOG"])) ? $INIF["BLOG"] : "";?></h2>
				</li>
				<div class="AreaLg-b-b">
					<label for="email"><span class="AreaLg-b-b-a">Email&nbsp;<?php if(isset($_POST["error_emailEmpty"]) && is_string($_POST["error_emailEmpty"])){ echo $_POST["error_emailEmpty"];}elseif(isset($_POST["error_unremail"]) && is_string($_POST["error_unremail"])){ echo $_POST["error_unremail"];}?></span></label>
					<input <?php echo (isset($_POST["email"])) ? 'value="'.$_POST["email"].'"' : ""; ?> type="text" name="email" class="AreaLg-b-b-b" id="email">
				</div>
				<div class="AreaLg-b-b">
					<label for="senha"><span class="AreaLg-b-b-a">Senha&nbsp;<?php if(isset($_POST["error_passEmpty"]) && is_string($_POST["error_passEmpty"])){ echo $_POST["error_passEmpty"];}elseif(isset($_POST["error_wrongpass"]) && is_string($_POST["error_wrongpass"])){ echo $_POST["error_wrongpass"];}?></span></label>
					<input type="password" name="pass" class="AreaLg-b-b-b" id="senha">
				</div>
				<div class="AreaLg-b-b">
					<label for="keeplogged">
						<div class="AreaLg-b-b-a-a">
							<input type="checkbox" name="email" id="keeplogged">
						</div>
						<span class="AreaLg-b-b-a_">Manter sess&#xe3;o iniciada</span>
					</label>
				</div>

				<div class="AreaLg-b-b">
					<input type="submit" name="logar" class="AreaLg-b-b-b_" value="Logar" id="login">
					<div class="AreaLg-b-b-b_a">
						<a class="AreaLg-b-b-b_a-a" href="<?php echo _UR_;?>reg/?ref=Index&ref_type=iniUsing">Criar conta</a>
					</div>
				</div>
			</form>

		</div>

	</div>
</div>

</body>
</html>