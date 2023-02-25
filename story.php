<?php 
	include_once (dirname(__FILE__)."/https/p/php/-ex_Conf.php");
	include (dirname(__FILE__)."/https/p/php/-ex_strySetPostComment.php"); 
	$Page = "Publicação";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Post | Coment&#xe1;rios</title>

	<?= stylesheets() ?>
</head>
<body>

<div id="contain">
	
	<?php 
		include_once (dirname(__FILE__)."/https/p/html/-ex_header.php");
	?>
	<?php 
		include_once (dirname(__FILE__)."/https/p/html/-ex_StoryPGContent.php");
	?>
	
	<?php 
		include_once (dirname(__FILE__)."/https/p/html/-ex_currentsside.php");
	?>


</div>

</body>
</html>