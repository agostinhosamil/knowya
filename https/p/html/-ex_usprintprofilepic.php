<?php 
	(isset($_Ref) && $_Ref = "_Sys-ReadURL" && is_object($_user_datas)) or exit("ERRO");
?>

<div class="profile_pic-element">
	<?php

		$user_pic = (isset($_user_datas->pic) && !empty($_user_datas->pic)) ? __PURL__."?-ref=non-EX&src=".urlencode(__PPATH__."/".$_user_datas->pic)."&width=130&height=160&ref_type=ImVwr&refid=non" : "http://localhost/blog/https/im/JWnJbks.jpg";

		echo '<img src="'.$user_pic.'">';

	?>
</div>