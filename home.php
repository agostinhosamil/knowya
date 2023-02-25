<?php 
	include_once (dirname(__FILE__)."/https/p/php/-ex_Conf.php");
	$Page = "Página inicial";
?>
<!DOCTYPE html>
<html>
<head>
	<title>BLOG</title>

	<?= stylesheets() ?>

  <?= scripts() ?>

</head>
<body>

<div id="contain">
	
	<?php 
		include_once (dirname(__FILE__)."/https/p/html/-ex_header.php");
	?>
	
	<main class="page-main-container-element">
		<?php 
			include_once (dirname(__FILE__)."/https/p/html/-ex_sidebar.php");

			include_once (isset($_Ref) && $_Ref = "_Sys-ReadURL" && is_object($_user_datas)) ? (dirname(__FILE__)."/https/p/html/-ex_USER-newsfeedcontent.php") : (dirname(__FILE__)."/https/p/html/-ex_newsfeedcontent.php");
 
			include_once (dirname(__FILE__)."/https/p/html/-ex_currentsside.php");
		?>
	</main>

</div>

</body>
</html>
