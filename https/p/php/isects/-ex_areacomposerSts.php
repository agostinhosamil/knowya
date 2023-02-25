<?php 

	(isset($nwf) && is_object($nwf) && defined("__USER__")) or exit("ERROR...");

	if(isset($INIF["allow_posts_from_visitors"]) && "true" == $INIF["allow_posts_from_visitors"]){
		
		partial('areacomposerSts', ['nwf' => $nwf]);

	}
