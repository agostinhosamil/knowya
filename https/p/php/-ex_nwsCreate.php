<?php

	(isset($nwf) && is_object($nwf) && defined("__USER__")) or exit("ERROR GRAVE..");

	$nwsCR = (isset($_POST["-nwslSubmit"])) ? "true" : undefined;

	$nws_title_placeholder = "Titulo da not&#xed;cia";
	$nws_body_placeholder = "Conte&#xfa;do da not&#xed;cia";
	$nws_summ_placeholder = "Resuma a tua not&#xed;cia";

	if(!is_undefined($nwsCR)){

		$nws_ = false;

		$post = $_POST;

		$u = __USER__;

		$data = getdate();

		$seg = $data["seconds"];
		$hr = $data["hours"];
		$min = $data["minutes"];
		$dia = $data["mday"];
		$mes = $data["mon"];
		$ano = $data["year"];

		$dataCR = join ('-', [$dia, $mes, $ano, $hr, $min, $seg]);

		$nid = "1000000".rand(00, 99).$dia.$hr.$ano.rand(000000, 999999).$min.$seg.$mes.time();


		if(empty($post["X-nwsTitle"]) || empty($post["X-nwsBody"])){

			echo "VAZIO";

			return false;

		}


		$titulo = (isset($post["X-nwsTitle"])) ? base64_encode(stripcslashes($post["X-nwsTitle"])) : "mundo";
		
		$body = (isset($post["X-nwsBody"])) ? base64_encode(stripcslashes($post["X-nwsBody"])) : "";
		
		$summarizing = (isset($post["X-nwsSumm"])) ? base64_encode(stripcslashes($post["X-nwsSumm"])) : "";

		$insert = $nwf->query("INSERT INTO news (nid, content, title, user_id, data, resumo) VALUES ('$nid', '$body', '$titulo', '$u', '$dataCR', '$summarizing')");

		if($insert){

			header("location: "._UR_."news/feed/?ref_c=NwsCR&nid=".$nid."&ref_type=Ln-Redir&ref=non-C");

		}else{

			echo "Did not insert<br/>".mysql_error();

		}


	}
