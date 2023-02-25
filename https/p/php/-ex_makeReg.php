<?php 

	$reg_done = false;

	$login_started = (isset($_POST["reg"])) ? "true" : undefined;

	if(!(is_undefined($login_started))){

		$name = strip_tags(filter_input(INPUT_POST, "name", FILTER_SANITIZE_STRING));
		$email = strip_tags(filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING));
		$pass = strip_tags(filter_input(INPUT_POST, "pass", FILTER_SANITIZE_STRING));
		$pass_ = strip_tags(filter_input(INPUT_POST, "pass_", FILTER_SANITIZE_STRING));

		if(empty($name) || empty($email) || empty($pass) || empty($pass_)){
			
			$_POST["error_emailEmpty"] = (empty($email)) ? "n&#xe3;o pode estar vazio" : "";
			$_POST["error_passEmpty"] = (empty($senha)) ? "n&#xe3;o pode estar vazia" : "";
			$_POST["error_nameEmpty"] = (empty($name)) ? "n&#xe3;o pode estar vazio" : "";
			$_POST["error_npassEmpty"] = (empty($senha_)) ? "n&#xe3;o pode estar vazia" : "";

		}else{

			$select = $nwf->query("SELECT id FROM users WHERE email = '$email'");

			if($select){

				if($nwf->rowCount($select) > 0){

					$_POST["error_unremail"] = "j&#xe1; existe noutra conta";

				}else{

					if($pass == $pass_){

						$web_ADDR = null;

						$alt_weba = explode(" ", $name)[ 0 ];

						$aa = $nwf->query("SELECT id FROM users WHERE web_addr = '$alt_weba'");

						if($aa){

							if($nwf->rowCount($aa) == 0){
								$web_ADDR = $alt_weba;
							}else{
								$web_ADDR = $alt_weba.$nwf->rowCount($aa);
							}

						}else{
							exit("NAO verifica");
						}

						$insert = $nwf->query("INSERT INTO users (name, email, pass, web_addr) VALUES ('$name', '$email', '$pass', '$web_ADDR')");

						if($insert){

							$buscar_dados = $nwf->query("SELECT id FROM users WHERE email = '$email'");

							if($buscar_dados){

								$ft = $nwf->fetch($buscar_dados);

								$_SESSION[$usercookie_name] = $ft->id;
					
								setcookie($usercookie_name, $ft->id, time()+3600*24*12*10, "/");

								header("location: "._UR_."home.php?ref_component=nwf_Lg&ref=index");

							}else{

								echo "<script>alert('NAo buscou dados')</script>";

							}

						}else{

							echo "<script>alert('Nao insere')</script>";

						}

					}else{
						$_POST["error_wrongpass"] = "diferente da outra";
					}

				}

			}else{

				echo "NAO VERIFICA";

			}


		}


	}