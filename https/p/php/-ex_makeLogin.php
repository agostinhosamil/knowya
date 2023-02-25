<?php 

	$login_done = false;

	$login_started = (isset($_POST["logar"])) ? "true" : undefined;

	if(!(is_undefined($login_started))){

		$email = strip_tags(filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING));
		$senha = strip_tags(filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING));

		if(empty($email) || empty($senha)){
			$_POST["error_emailEmpty"] = (empty($email)) ? "n&#xe3;o pode estar vazio" : "";
			$_POST["error_passEmpty"] = (empty($senha)) ? "n&#xe3;o pode estar vazia" : "";
		}else{

			$select = $nwf->query("SELECT id,pass,name FROM users WHERE email = '$email'");

			if($select){

				if($nwf->rowCount($select) > 0){

					$ft = $nwf->fetch($select);

					if(!($ft->pass != $senha)){

						$_SESSION[$usercookie_name] = $ft->id;
						
						setcookie($usercookie_name, $ft->id, time()+3600*24*12*10, "/");

						header("location: home.php?ref_component=nwf_Lg&ref=index");

					}else{

						$_POST["error_wrongpass"] = "est&#xe1; incorrecta";

					}



				}else{

					$_POST["error_unremail"] = "n&#xe3;o existe no BLOG";

				}

				

			}else{
				echo 'NAO buscou';
			}

		}




	}