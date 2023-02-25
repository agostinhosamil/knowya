<?php 
	include_once (dirname(dirname(__FILE__))."/https/p/php/-ex_Conf.php");
	$Page = "Opções";
?>
<!DOCTYPE html>
<html>
<head>
	<title>BLOG</title>

	<?= stylesheets() ?>

</head>
<body>
<div id="contain">
	
	<?php 
		include_once (dirname(dirname(__FILE__))."/https/p/html/-ex_header.php");
	?>
	<?php 
		include_once (isset($_GET["sp"]) && !empty($_GET["sp"]) && file_exists(dirname(__FILE__)."/-p/".$_GET["sp"].".php")) ? (dirname(__FILE__)."/-p/".$_GET["sp"].".php") : (dirname(dirname(__FILE__))."/https/p/html/-ex_sidebar.php");
	?>
	<?php 
		include_once (dirname(dirname(__FILE__))."/https/p/html/-ex_exsection-othermnoptions.php");
	?>
	<?php 
		include_once (dirname(dirname(__FILE__))."/https/p/html/-ex_currentsside.php");
	?>


</div>

</body>
</html>