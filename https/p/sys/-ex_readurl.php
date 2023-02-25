<?php

	(isset($_GET["url"]) && !empty($_GET["url"])) or die("Page not avaliable");

	include_once (dirname(dirname(__FILE__))."/php/-ex_Conf.php");

	$f_url = explode("/", trim(stripslashes(strip_tags(strtolower($_GET["url"])))));

	if(count($f_url) > 1){
		
		$na = count($f_url);

		if(empty($f_url[ count($f_url) - 1 ])){
			$web_addr = str_replace("/", "", $f_url[ 0 ]);
		}else{
			echo $f_url[ count($f_url) - 1 ];
		}

	}


	$ex_pg_vrfy = "https/p/-ex_pages".$f_url[ 0 ].".php";

	if(file_exists($ex_pg_vrfy)){
		exit( include ( $ex_pg_vrfy ) );
	}else{
		
		$web_addr = $f_url[ 0 ];

		$vrfy_weba = $nwf->query("SELECT id FROM users WHERE web_addr = '$web_addr'");

		if($vrfy_weba){

			if($nwf->rowCount($vrfy_weba) == 1){

				$id = $nwf->fetch($vrfy_weba)->id;

				$_user_datas = user_get_datas($id, "name, id, pic");

				$_Ref = "_Sys-ReadURL";

				$id_usr = (isset($_SESSION[$usercookie_name])) ? $_SESSION[$usercookie_name] : null;

				if(is_null($id_usr)){
					
					$id_user = (isset($_COOKIE[$usercookie_name])) ? $_COOKIE[$usercookie_name] : null;

					if(is_null($id_user)){

						header('location: '._UR_.'?ref_component=nwf_rpage&access=denied&ref=any_0');

					}elseif(is_object(user_get_datas($id_user, "id"))){

						$_SESSION[$usercookie_name] = $_COOKIE[$usercookie_name];

						include_once (dirname(dirname(dirname(dirname(__FILE__))))."/home.php");

					}else{

						header('location: '._UR_.'?ref_component=nwf_rpage&access=denied&ref=any_0');

					}

				}else{

					if(is_object(user_get_datas($id_usr, "id"))){
						include_once (dirname(dirname(dirname(dirname(__FILE__))))."/home.php");
					}else{
						unset($_SESSION[$usercookie_name]);
						header('location: '._UR_.'?ref_component=nwf_rpage&access=denied&ref=any_0');
					} 

				}

			

			}else{

				exit("Page not found");

			}

		}else{

			echo 'Erro ao selecionar';

		}

	} 