<?php 

	include_once (dirname(dirname(dirname(__FILE__)))."/https/p/php/-ex_Conf.php");

	if(isset($_GET["nid"]) && !empty($_GET["nid"])){
		exit(include(dirname(__FILE__)."/-in_nwsrd.php"));
	}else{
		exit(include(dirname(__FILE__)."/-in_index.php"));
	}