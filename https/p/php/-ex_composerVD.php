<?php 

	(isset($nwf) && is_object($nwf) && defined("__USER__")) or exit("ERRO...");

	$cmpsr_sub = (isset($_POST["X-Composer"])) ? "true" : undefined;

	if(!is_undefined($cmpsr_sub)){

		$photos = null;
		$video = null;

		if(isset($_POST["X-msg"])){
			
			$content = filter_var(trim(base64_encode($_POST["X-msg"])) ,FILTER_SANITIZE_STRING);

			if(empty($content) && empty($_FILES["imgs"]["name"][0])){

				echo '<div class="errorif">O teu post n&#xe3;o pode estar vazio</div>';

			}else{

				$id_user = $_SESSION[$usercookie_name];

				$data = getdate();

				$seg = $data["seconds"];
				$hr = $data["hours"];
				$min = $data["minutes"];
				$dia = $data["mday"];
				$mes = $data["mon"];
				$ano = $data["year"];

				$data_post = $dia."-".$mes."-".$ano."-".$hr."-".$min."-".$seg;

				if(isset($_FILES["imgs"])){
					$anexos = images_upload($_FILES["imgs"]);
				}

				$images = (count(json_decode($anexos)) >= 1) ? $anexos : null;
				$cod = "1000001".$seg.$ano.rand(00000,99999).$dia.$min.$hr.rand(000,999).$mes;			
			
				$ins = $nwf->query("INSERT INTO posts (id_user, codigo, content, anexos, data) VALUES ('$id_user', '$cod', '$content', '$images', '$data_post')");

				if($ins){

					$anx = json_decode($anexos);

					for($i = 0; $i < count($anx); $i++){

						$images_save = images_save($anx[$i], $cod, "post");

						if(!is_int($images_save)){
							echo "NAO SALVOU IMG<br/>";
						}

					}

					$_POST["success"] = 1;

				}else{

					echo "MAU";

				}
			

			}


		}


	}