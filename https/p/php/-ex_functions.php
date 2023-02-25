<?php 

	$nwf = new NWF\nwf;
	$feed = new NWF\Feed;

	$_SERVER["paginas_restritas"] = array("home.php","story.php","postar.php", "videos", "photos", "about", "othermnoptions", "feed", "news", "createnews");
	$_SERVER["nolog_pages"] = array("index.php","reg");
	$_SERVER["forbiden_files"] = array("nwfConfs.ini");

	$usercookie_name = (isset($INIF["sys_usercookie_name"])) ? $INIF["sys_usercookie_name"] : null;

	session_start();

	define("undefined", "undefined");

//	define("COMPOSER_TEXT", $INIF["nwf_composerText"]);

	function is_undefined($var){
		return (isset($var) && $var == undefined) ? true : false;
	}

	function is_mail($var = null){

		if(is_null($var)){
			return false;
		}elseif(empty($var)){
			return false;
		}elseif(strlen($var) >= 61){
			return false;
		}else{

			if(filter_var($var, FILTER_VALIDATE_EMAIL)){
				return true;
			}else{
				return false;
			}

		}

	}

	function isr_name($var = null){

		$erro = null;

		if(is_null($var)){
			$erro = "null";
			return $erro;
		}elseif(empty($var)){
			$erro = "empty";
			return $erro;
		}elseif(strlen($var) >= 36){
			$erro = "slong";
			return $erro;
		}else{

			if(count(explode(" ", $var)) >= 4){
				$erro = "snames";
				return $erro;
			}else{
				return true;
			}

		}

	}

	function is_par($num = null){
		return (!is_null($num) && is_int($num / 2)) ? true : false;
	}


	function user_get_datas($us = null, $datas = "id,email"){

		$nwf = new NWF\nwf;

		if(is_null($us)){
			return false;
		}else{

			$sel = $nwf->query("SELECT $datas FROM users WHERE id = '$us'");

			if($sel){

				if($nwf->rowCount($sel) > 0){

					return $nwf->fetch($sel, "OBJ");

				}else{

					return false;

				}

			}else{

				return false;

			}

		}

	}


	// $date = "dia-mes-ano-h-m-s";
	function dec_date($tm_var = null){

		if(empty($tm_var)){
			return false;
		}else{

			$expl = explode("-",$tm_var);

			return array(

				"ano" => (isset($expl[2])) ? $expl[2] : "",
				"mes" => (isset($expl[1])) ? $expl[1] : "",
				"dia" => (isset($expl[0])) ? $expl[0] : "",

				"hora" => (isset($expl[3])) ? $expl[3] : "",
				"min" => (isset($expl[4])) ? $expl[4] : "",
				"seg" => (isset($expl[5])) ? $expl[5] : "",

				);

		}

	}

	function date_read($str = null){

		// dia-mes-ano-hora-minuto-segundo

		$data = getdate();

		$seg = $data["seconds"];
		$hr = $data["hours"];
		$min = $data["minutes"];
		$dia = $data["mday"];
		$mes = $data["mon"];
		$ano = $data["year"];

		$MES = array("", "Janeiro","Fevereiro","Mar&#xe7;o","Abril","Maio","Junho","Julho","Agosto","Setembro","Outubro","Novembro","Dezembro");

		if(is_null($str)){
			return "";
		}else{

			$date = dec_date($str);

			if(6 == count($date)){

				if($date["ano"] == $ano){

					if($date["mes"] == $mes){

						if($date["dia"] == $dia){

							if($date["hora"] == $hr){

								if($date["min"] == $min){

									return "Agora mesmo";

								}else{

									$dif = ($min - $date["min"]);

									if($dif < 3){
										return "Agora mesmo";
									}else{
										return "H&#xe1; ".$dif." minutos";
									}

								}

							}else{

								$dif = ($hr - $date["hora"]);

								if($dif = 1){
									return "H&#xe1; ".$dif." hora";
								}elseif($dif < 7){
									return "H&#xe1; ".$dif." horas";
								}else{
									return "Hoje, ".$date["hora"]."h";
								}

							}

						}else{

							$dif = ($dia - $date["dia"]);

							if($dif == 1){
								return "Ontem";
							}elseif($dif < 4){
								return "H&#xe1; ".$dif." dias";
							}else{
								return "dia ".$date["dia"];
							}

						}

					}else{

						$dif = ($mes - $date["mes"]);

						if($dif < 4){
							return "H&#xe1; ".$dif." meses";
						}else{
							return "dia ".$date["dia"]." de ".$MES[ (int)$date["mes"] ];
						}

					}

				}else{

					$dif = ($ano - $date["ano"]);

					if($dif < 4){
						return "H&#xe1; ".$dif." anos";
					}else{
						return $MES[ (int)$date["mes"] ]." de ".$date["ano"];
					}

				}

			}else{

				return "";

			}

		}

	}

	function tags_encode($str = null){

		if(is_null($str)){
			return ("");
		}elseif(is_string($str)){

			$newStr = str_replace("<", "&lt;", str_replace(">", "&gt;", $str));

			return htmlentities($newStr);

		}else{

			return false;

		}

	}

	function specialchars_considere($str){

		if(is_null($str)){
			return ("");
		}elseif(is_string($str)){

			$nstr = str_replace("\n", "<br/>", str_replace(" ", "&nbsp;", $str));

			$nstr = preg_replace("(#[a-zA-Z0-9-_.][^( |,|;|:|=|\/|\n|<)]++)", '<a href="'._UR_.'hash/">\\0</a>', $nstr);
			$nstr = preg_replace("(@[a-zA-Z0-9-_.][^( |,|;|:|=|\/|\n|<)]++)", '<a href="'._UR_.'bk/">\\0</a>', $nstr);

			return (strlen($nstr) <= 625) ? (string)($nstr) : substr($nstr, 0, 625).'...&nbsp;<a href="">Mais</a>';

		}else{

			return false;

		}

	}

	function considere_specialchars($str){

		if(is_null($str)){
			return ("");
		}elseif(is_string($str)){

			$nstr = str_replace("\n", "<br/>", str_replace(" ", "&nbsp;", $str));

			return (string)$nstr;

		}else{

			return false;

		}

	}

	function images_upload($input = null){

		if(is_null($input)){
			return "";
		}

		$data = getdate();

		$seg = $data["seconds"];
		$hr = $data["hours"];
		$min = $data["minutes"];
		$dia = $data["mday"];
		$mes = $data["mon"];
		$ano = $data["year"];

		$imsQTD = (is_array($input["name"])) ? "multiple" : "uniq";

		$imgs = ("multiple" == $imsQTD) ? $input : array("name" => array($input["name"]), "tmp_name" => array($input["tmp_name"]), "size" => array($input["size"]), "error" => array($input["error"]), "type" => array($input["type"]) );

		$p_types = array("image/jpeg", "image/pjpeg", "image/jpg");

		$i = 0;

		$emptyIMGS = 0;

		$images = array();

		for( ;$i < count($imgs["name"]); $i++){

			$name = $imgs[ "name" ][ $i ];
			$tmp = $imgs[ "tmp_name" ][ $i ];
			$type = $imgs[ "type" ][ $i ];
			$error = $imgs[ "error" ][ $i ];
			$size = $imgs[ "size" ][ $i ];

			if(4 == $error){
				$emptyIMGS++;
				continue;
			}

			$nname = "10000000".$seg.$ano.rand(000000,999999).$mes.$min.$hr.rand(00,99).$dia.".jpg";

			$PATH = dirname(dirname(dirname(__FILE__)))."/img/-net/yz/".$nname;

			if(in_array($type, $p_types)){

				if(move_uploaded_file($tmp, $PATH)){

					$images[ $i ] = $nname;

				}else{

					echo "Isto é mau<br/>";

				}

			}else{

				echo '<div class="errorif">O arquivo '.$name.' n&#xe3;o &eacute; uma imagem</div>';

			}
			

		}

		return json_encode($images);

	}

	function images_save($name = null, $aid = null, $a = "user"){

		if(is_null($name) || is_null($aid)){
			return false;
		}

		if(!(is_string($name))){
			return null;
		}

		$nwf = new NWF\nwf;

		$idArg = $a."_id";

		$ins = $nwf->query("INSERT INTO images (name, $idArg, a) VALUES ('$name', '$aid', '$a')");

		if($ins){

			$sel = $nwf->query("SELECT id FROM images");

			if($sel){
				return $nwf->rowCount($sel);
			}else{	
				return "";
			}

		}else{

			echo "NAo insere<br/>";

		}



	}

	function images_setpath($imgs = null, $attrs = "", $show_all_media = false, $idp = null){

		if(is_null($imgs)){
			return null;
		}

		if(!is_array($imgs) && !is_string($imgs)){
			return false;
		}

		$id_post = (is_int($show_all_media)) ? $show_all_media : $idp;

		$images = (is_array($imgs)) ? $imgs : array($imgs);

		$imgs = "";

		$tag_attrs = explode(";", trim(stripcslashes($attrs)));

		$imgs_num = 0;

		if(count($images) == 0){
			return "";
		}

		if(count($images) == 1){

			$tgattr = (isset($tag_attrs[0])) ? " ".$tag_attrs[0] : "";

			return '<img src="'.__PPATH__.'/'.$images[0].'"'.$tgattr.'>';

		}else{

			if(is_par(count($images))){

				for($i = 0; $i < count($images); $i++){

					if(!$show_all_media){
						if($imgs_num >= 4){
							$imgs .= '<li class="w-a-a-a"><a class="w-a-a-a-a" href="'._UR_.'story.php?id='.$id_post.'&ref_component=non-EX&ref=non">Ver Mais '.(count($images) - $imgs_num).' foto/s</a></li>';
							return $imgs;
						}
					}

					$img = $images[ $i ];
					$tgattr = (isset($tag_attrs[1])) ? " ".$tag_attrs[1] : "";
					
					$imgs .= '<img src="'.__PURL__.'?ref_=non-EX&src='.urlencode(__PPATH__.'/'.$img).'&width=210&height=210&ref-type=imVwrNwf&refid=non"'.$tgattr.' square="square">';

					$imgs_num++;
					
				}

				return $imgs;

			}else{

				for($i = 0; $i < (count($images) - 1); $i++){

					if(!$show_all_media){
						if($imgs_num >= 4 && $imgs_num != 5){

							$imgs .= '<li class="w-a-a-a"><a class="w-a-a-a-a" href="'._UR_.'story.php?id='.$id_post.'&ref_component=non-EX&ref=non">Ver Mais '.(count($images) - $imgs_num).' foto/s</a></li>';
							return $imgs;
						}
					}

					

					$img = $images[ $i ];
					$tgattr = (isset($tag_attrs[1])) ? " ".$tag_attrs[1] : "";
					
					$imgs .= '<img src="'.__PURL__.'?ref_=non-EX&src='.urlencode(__PPATH__.'/'.$img).'&width=210&height=210&ref-type=imVwrNwf&refid=non"'.$tgattr.' square="square">';
					
				}

				$_imgSRC = __PPATH__.'/'.$images[ count($images) - 1 ];

				$imgs .= '<img src="'.__PURL__.'?ref_=non-EX&src='.urlencode($_imgSRC).'&width=426&height=210&view=thumb&ref-type=imVwrNwf&refid=non"'.$tag_attrs[2].'>';

				return $imgs;

			}

		}

		


	}

	function push($array, $nwi){

		$new_index = (count($array) + 1);

		$array[ $new_index ] = $nwi;

		return $array;

	}


	function parse_text_file($file){

		if(!file_exists($file)){
			return "";
		}

		if(pathinfo($file, PATHINFO_EXTENSION) != "txt"){
			return "Error, this is not a text file";
		}

		$content = file_get_contents($file);

		return considere_specialchars(tags_encode($content));

	}

	function str_mult($str = null, $n = 2, $hs = ""){

		if(is_null($str) || !is_string($str)){

			return "";

		}else{

			if(!is_int($n)){

				$n = 1;

			}

			if(!is_string($hs)){
				$hs = "";
			}

			$new_str = "";

			for($i = 0; $i < $n; $i++){

				$h_s = (($i + 1) >= $n) ? "" : $hs;

				$new_str .= $str.$h_s;

			}

			return $new_str;

		}

	}

	function Agora(){

		$data = getdate();

		$seg = $data["seconds"];
		$hr = $data["hours"];
		$min = $data["minutes"];
		$dia = $data["mday"];
		$mes = $data["mon"];
		$ano = $data["year"];

		$data_ = $dia."-".$mes."-".$ano."-".$hr."-".$min."-".$seg;

		return $data_;

	}


	// echo tags_encode('HTML 5<div class="nwf-content nwf-post" id="" nwf-datas='{"id":"187639"}'></div>');e
