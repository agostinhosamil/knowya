<?php

	include(dirname(dirname(__FILE__))."/https/p/php/-ex_Conf.php");

	unset($_SESSION[$usercookie_name]);

	session_destroy();

	setcookie($usercookie_name, undefined, time()*30*12*10, "/");

	header("location: "._UR_."?ref_=logout");