<?php

	$pagina_ = $_SERVER["PHP_SELF"];
	$exp = explode("/", $pagina_);
	$exp_ = $exp[ count($exp) - 1 ];

	if(in_array($exp_, $_SERVER["paginas_restritas"]) || in_array($exp[ 2 ], $_SERVER["paginas_restritas"])){

		// Sendo esta uma pagina restrita procurar saber se a sessao esta iniciada

		if(!(isset($_SESSION[$usercookie_name]))){

			if(!(isset($_COOKIE[$usercookie_name]))){
				header('location: '._UR_.'?ref_component=nwf_rpage&access=denied&ref=any_0');
			}else{

				$id_user = $_COOKIE[$usercookie_name];

				if(!is_object(user_get_datas($id_user))){

					setcookie($usercookie_name, undefined, time()+3600*24*12*10, "/");

					header('location: '._UR_.'?ref_component=nwf_rpage&access=denied&ref=any_0');

				}

				$_SESSION[$usercookie_name] = $_COOKIE[$usercookie_name];

				header('location: '._UR_.'home.php?ref_component=nwf_apage&access=fgot&ref=any_1');

			}

		}else{

			$id_us = $_SESSION[$usercookie_name];

			if(!is_object(user_get_datas($id_us))){
				
				unset($_SESSION[$usercookie_name]);

				header('location: '._UR_.'?ref_component=nwf_rpage&access=denied&ref=any_0');

			}

		}

	}elseif(in_array($exp_, $_SERVER["nolog_pages"]) || in_array($exp[ 2 ], $_SERVER["nolog_pages"])){

		if(isset($_SESSION[$usercookie_name])){

			$id_us = $_SESSION[$usercookie_name];

			if(is_object(user_get_datas($id_us))){
				
				header('location: '._UR_.'home.php?ref_component=nwf_apage&access=fgot&ref=any_1');

			}

		}elseif(isset($_COOKIE[$usercookie_name])){

			$id_user = $_COOKIE[$usercookie_name];

			if(is_object(user_get_datas($id_user))){

				$_SESSION[$usercookie_name] = $id_user;

				header('location: '._UR_.'home.php?ref_component=nwf_apage&access=fgot&ref=any_1');

			}

		}

	}

	$p_self = explode("/", explode("?", $_SERVER["REQUEST_URI"])[ 0 ]);

	$cp_self = $p_self[ count($p_self) - 1 ];

	if($cp_self == "index.php"){
		exit("Page not found");
	}