<?php 
	include_once (dirname(dirname(dirname(dirname(__FILE__))))."/https/p/php/-ex_Conf.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>BLOG</title>

	<?= stylesheets() ?>

	<style type="text/css">
		body {
			background: rgb(255, 255, 255) none repeat scroll 0% 0% !important;
		}
	</style>

	<noscript>PESSimo</noscript>
</head>
<body>
<div id="contain">
	
	<?php 
		include_once (dirname(dirname(dirname(dirname(__FILE__))))."/https/p/html/-ex_header.php");
	?>
	
	<?php 
		include_once (dirname(dirname(dirname(dirname(__FILE__))))."/https/p/html/-ex_exsection-newscreate.php");
	?>

	<?php 
		include_once (dirname(dirname(dirname(dirname(__FILE__))))."/https/p/html/-ex_currentsside.php");
	?>


</div>

</body>
</html>
