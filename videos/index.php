<?php 
	include_once (dirname(dirname(__FILE__))."/https/p/php/-ex_Conf.php");
	$Page = "Vídeos";
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

		include_once (dirname(dirname(__FILE__))."/https/p/html/-ex_sidebar.php");

		include_once (dirname(dirname(__FILE__))."/https/p/html/-ex_exsection-sitevideos.php");

		include_once (dirname(dirname(__FILE__))."/https/p/html/-ex_currentsside.php");
	?>

</div>

</body>
</html>