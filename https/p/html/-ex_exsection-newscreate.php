<div id="nwsl" style="background:#ffffff none repeat scroll 0% 0%">

<?php include_once (dirname(dirname(__FILE__))."/php/-ex_nwsCreate.php");?>

	<form method="post" action="<?php echo str_replace("index.php","", $_SERVER["PHP_SELF"]);?>">
		<div class="nwslTypei">
			<input type="hidden" name="X-nwsTitle" class="nwstitle">
			<input type="hidden" name="X-nwsBody" class="nwsbody">
			<input type="hidden" name="X-nwsSumm" class="nwssumm">

			<div class="nwslTypei-a">
				<li class="nwslTypei-a-a nwslTypei-a-a_">
					<i class="nwslTypei-a-a-a nws-title input-text" data-type=".nwstitle" contenteditable="true"><?php echo (isset($_POST["X-nwsTitle"])) ? considere_specialchars($_POST["X-nwsTitle"]) : $nws_title_placeholder;?></i>
				</li>
				<li class="nwslTypei-a-b nwslTypei-a-a_">
					<i class="nwslTypei-a-b-a input-text" data-type=".nwssumm" contenteditable="true"><?php echo (isset($_POST["X-nwsSumm"])) ? considere_specialchars($_POST["X-nwsSumm"]) : $nws_summ_placeholder;?></i>
				</li>
				<li class="nwslTypei-a-c nwslTypei-a-a_">
					<i class="nwslTypei-a-c-a nws-body-a input-text" data-type=".nwsbody" contenteditable="true"><?php echo (isset($_POST["X-nwsBody"])) ? considere_specialchars($_POST["X-nwsBody"]) : $nws_body_placeholder;?></i>
				</li>



			</div>

		</div>
		<div class="nwslSubmit">
			<div class="nwslSubmit-a">
				<input class="nwslSubmit-a-a" type="submit" name="-nwslSubmit" value="Publicar not&#xed;cia">
			</div>
		</div>

	</form>
</div>

<script type="text/javascript">
(function(d, w){

	try{

		d.addEventListener("readystatechange", (function(){

			if(d.readyState == "complete"){

				var interf = (w.requestAnimationFrame || w.setInterval);

				var a = (function(){

					var inputs = d.querySelectorAll(".input-text"),
						i = 0;

					for( ; i<inputs.length;i++){

						var input = inputs[ i ],
							target = input.getAttribute("data-type"),
							targetElement = d.querySelectorAll(target);

						if(targetElement.length > 0){
							targetElement = targetElement[ 0 ];
						}else{alert("MAU");}

						targetElement.value = input.innerText;


					}

					interf(a, 50);

				});

				a();

			}

		}));

	}catch(err){

		console.log(err);

	}

}(document, window))
</script>