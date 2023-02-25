<?php 
	(isset($_Ref) && $_Ref = "_Sys-ReadURL" && is_object($_user_datas)) or exit("ERRO");
?>
<div id="newsfeeed">
<?php 
	
	if(__USER__ == $_user_datas->id){
		include_once (dirname(dirname(__FILE__))."/php/isects/-ex_areacomposerSts.php");
	}

	include_once (dirname(__FILE__)."/-ex_areanwf.php");
	
?>
</div>