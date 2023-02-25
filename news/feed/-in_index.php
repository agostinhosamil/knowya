<?php 
	include_once (dirname(dirname(dirname(__FILE__)))."/https/p/php/-ex_Conf.php");
	$Page = "Notícias";
?>
<!DOCTYPE html>
<html>
<head>
	<title>BLOG</title>

	<link rel="stylesheet" type="text/css" href="/blog/https/css/EkskklwlakKmwk.css">
	<link rel="stylesheet" type="text/css" href="/blog/https/css/EkskklwlckKmwk.css">
	<style type="text/css">
	body{
		background:rgb(255, 255, 255) none repeat scroll 0% 0% !important;
	}
	</style>
</head>
<body>
<div id="contain">
	
	<?php 
		include_once (dirname(dirname(dirname(__FILE__)))."/https/p/html/-ex_header.php");
	?>
	
	<?php 
		include_once (dirname(dirname(dirname(__FILE__)))."/https/p/html/-ex_exsection-newslist.php");
	?>

	<?php 
		include_once (dirname(dirname(dirname(__FILE__)))."/https/p/html/-ex_currentsside.php");
	?>


</div>

</body>
</html>