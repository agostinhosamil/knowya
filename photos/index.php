<?php 
	include_once (dirname(dirname(__FILE__))."/https/p/php/-ex_Conf.php");
	$Page = "Fotos";
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
		include_once (dirname(dirname(__FILE__))."/https/p/html/-ex_sidebar.php");
	?>
	<?php 
		include_once (dirname(dirname(__FILE__))."/https/p/html/-ex_exsection-sitephotos.php");
	?>
	<?php 
		include_once (dirname(dirname(__FILE__))."/https/p/html/-ex_currentsside.php");
	?>

	

	

	


</div>

</body>
</html>