<?php

	namespace NWF;

	use PDO;

	$INIF = parse_ini_file("conffiles/nwfConfs.ini");

	define("__PPATH__", $INIF["photos_default_path"]);
	define("__PURL__", $INIF["photo_viewer"]);

	class nwf{

		private $INIF = "conffiles/nwfConfs.ini";

		private $conn;

		public function __construct(){

			$idata = parse_ini_file($this->INIF);

			try{
				$this->conn = new PDO("mysql:host=".$idata["HOST"].";dbname=".$idata["DB"]."", $idata["USER"], $idata["PASS"]);
			}catch(PDOException $e){
				echo $e->get_massege();
			}

		}

		public function query($query = null){
			$prp = $this->conn->prepare($query);
			$prp->execute();
			return $prp;
		}

		public function rowCount($q = null){
			return (!is_null($q) && is_object($q)) ? $q->rowCount() : null;
		}

		public function fildCount($q = null){
			return (!is_null($q) && is_object($q)) ? $q->rowCount() : null;
		}

		public function fetch($qr = null, $q = null){
			if(is_null($q)){
				return (!is_null($qr) && is_object($qr)) ? $qr->fetch(PDO::FETCH_OBJ) : false;
			}

			switch($q){
				case "OBJ": 
					return (!is_null($qr) && is_object($qr)) ? $qr->fetch(PDO::FETCH_OBJ) : false;
				break;

				case "ASSOC": 
					return (!is_null($qr) && is_object($qr)) ? $qr->fetch($qr, PDO::FETCH_ASSOC) : false;
				break;

				case "ARRAY": 
					return (!is_null($qr) && is_object($qr)) ? $qr->fetch($qr, PDO::FETCH_ASSOC) : false;
				break;

				case "LENGTH": 
					return mysql_fetch_lengths($qr);
				break;

				default:
					return false;
				break;
			}

		}



	}

	class Feed extends nwf{

		public $Vis = null;

		public function get_pdatas($id = null, $datas = "*", $a = "GDT"){

			if(is_null($id)){

				return false;

			}elseif(is_string($id) || is_int($id)){

				$sel = $this->query("SELECT $datas FROM posts WHERE id = '$id'");

				if($sel){

					switch($a){

						case "GDT":

							if($this->rowCount($sel) > 0){

								return $this->fetch($sel);

							}else{

								return false;

							}

						break;

						case "COUNT":
							return $this->rowCount($sel);
						break;

					}

				}else{

					return $sel;

				}

			}else{

				return false;

			}
				
		}

		public function get_cdatas($id = null, $datas = "*", $a = "GDT"){

			if(is_null($id)){

				return false;

			}elseif(is_string($id) || is_int($id)){

				$sel = $this->query("SELECT $datas FROM comments WHERE id = '$id'");

				if($sel){

					switch($a){

						case "GDT":

							if($this->rowCount($sel) > 0){

								return $this->fetch($sel);

							}else{

								return false;

							}

						break;

						case "COUNT":
							return $this->rowCount($sel);
						break;

					}

				}else{

					return $sel;

				}

			}else{

				return false;

			}
				
		}

		public function nprint($id = null, $show_media = true, $show_all_media = false){

			if(is_null($id)){

				return false;

			}elseif(is_string($id) || is_int($id)){

				$pdatas = $this->get_pdatas($id);
				$usdatas = user_get_datas($pdatas->id_user, "name, id, pic, web_addr");

				$PContent = (!empty($pdatas->content)) ? '<span class="t u">'.specialchars_considere(tags_encode(base64_decode($pdatas->content))).'</span>' : ""; 

				$images = "";

				$user_pic = (isset($usdatas->pic) && !empty($usdatas->pic)) ? __PPATH__."/".$usdatas->pic : "http://localhost/blog/https/im/JWnJbks.jpg";

				if("object" === gettype($pdatas)){

					if($show_media){
						if(!(empty($pdatas->anexos))){

							$ims_ = images_setpath(json_decode($pdatas->anexos), 'class="w"; class="w-a";class="w-a-a"', $show_all_media, $id);

							$images = (is_string($ims_) && !empty($ims_)) ? '<figure class="v">'.$ims_.'</figure>' : "";

						}
					}

					$like_option = $this->glike_option($pdatas->id);
					$post_likes = $this->gnum_likes($pdatas->id);

					echo '<div id="Post_" class="postagem l"><div class="m"><div class="n"><img src="'.__PURL__.'?ref_type=ImVwr&src='.urlencode($user_pic).'&width=39&height=39&ref=non-XU&refid=U" class="o p"></div><dl class="q"><li class="r"><a href="'._UR_.''.strtolower($usdatas->web_addr).'/">'.$usdatas->name.'</a></li><li class="r"><span>'.date_read($pdatas->data).'</span></li></dl></div><div class="conteudo_post"><li class="s">'.$PContent.''.$images.'</li></div><div class="conteudo_post"><li class="s s-a">'.$post_likes.'</li></div><div class="opcoes_post"><ul class="x"><li class="y">'.$like_option.'</li><li class="y"><a href="'._UR_.'story.php?id='.$pdatas->id.'" class="z">Comentar</a></li><li class="y"><a href="'._UR_.'a/save.php?id='.$pdatas->id.'&ref=any&a=like_nwfCon" class="z -MrO">Guardar</a></li><li class="y"><a href="'._UR_.'stry/os.php?id='.$pdatas->id.'&ref=any&a=like_nwfCon" class="z -MrO">Mais</a></li></ul></div></div>';

				}else{

					return null;

				}


			}else{

				return false;

			}
				
		}

		public function cprint($id = null, $show_media = true){

			if(!is_null($id) || !(is_string($id) || is_int($id))){

				$cdatas = $this->get_cdatas($id);
				$usdatas = (is_object($cdatas)) ? user_get_datas($cdatas->id_user, "name, id, pic, web_addr") : null;

				$user_pic = (isset($usdatas->pic) && !empty($usdatas->pic)) ? __PPATH__."/".$usdatas->pic : "http://localhost/blog/https/im/JWnJbks.jpg";

				$CContent = (!empty($cdatas->content)) ? '<span class="t u">'.specialchars_considere(tags_encode(base64_decode($cdatas->content))).'</span>' : ""; 

				if(is_object($usdatas)){

					$like_option = $this->glike_option($cdatas->id);
					//$post_likes = $this->gnum_likes($pdatas->id);

					echo '<div id="comentario" class="strpgc-a-a-b">
			<div class="strpgc-a-a-b-a">
				<div class="strpgc-a-a-b-a-a"><img src="'.__PURL__.'?ref_type=ImVwr&src='.urlencode($user_pic).'&width=48&height=48&ref=non-XU&refid=U"></div>
				<div class="strpgc-a-a-b-a-b">
					<dl class="strpgc-a-a-b-a-b-a">
						<li class="strpgc-a-a-b-a-b-a-a">
							<a href="'._UR_.''.strtolower($usdatas->web_addr).'/" class="strpgc-a-a-b-a-b-a-a-a">'.$usdatas->name.'</a>
						</li>
						<li class="strpgc-a-a-b-a-b-a-b">
							<span class="strpgc-a-a-b-a-b-a-b-a">'.$CContent.'</span>
						</li>
						<dt class="strpgc-a-a-b-a-b-a-c">
							<li class="strpgc-a-a-b-a-b-a-c-a">
								<a href="" class="strpgc-a-a-b-a-b-a-c-a-a">Gosto</a>
							</li>
						</dt>
					</dl>
				</div>
			</div>
		</div>';

				}else{

					return null;

				}


			}else{

				return false;

			}

		}

		public function nwsbd_tagsRead($str = null){

			if(is_null($str)){
				return "";
			}

			$str = preg_replace("(<bold>[a-zA-Z0-9.-_][^<\/bold])", '<span class="nws-body-boldtext">'.strip_tags('\\0').'</span>', str_replace("[bold]", "<bold>", str_replace("[/bold]", "</bold>", $str)));
			$str = preg_replace("(<underline>[a-zA-Z0-9.-_][^<\/underline])", '<span class="nws-body-underlinetext">'.strip_tags('\\0').'</span>', str_replace("[underline]", "<underline>", str_replace("[/underline]", "</underline>", $str)));
			$str = preg_replace("(<italic>[a-zA-Z0-9.-_][^<\/italic])", '<span class="nws-body-italictext">'.strip_tags('\\0').'</span>', str_replace("[italic]", "<italic>", str_replace("[/italic]", "</italic>", $str)));
			$str = preg_replace("(<box>[a-zA-Z0-9.-_][^<\/box])", '<div class="nws-body-boxElemnt">\\0</div>', str_replace("[box]", "<box>", str_replace("[/box]", "</box>", $str)));


			return $str;


		}

		public function glike_option($id = null, $a = "post"){

			if(is_null($id)){
				return null;
			}

			$a = (is_string($a)) ? $a : "post";

			$u = __USER__;

			switch($a){

				case "post":

					$vr_like = $this->query("SELECT id FROM likes WHERE id_user = '$u' AND id_post = '$id' AND a = '$a'");

					if($vr_like){

						return ($this->rowCount($vr_like) >= 1) ? '<a href="'._UR_.'a/unlike.php?id='.$id.'&-a='.$a.'&ref=any&a=like_nwfCon" class="z">N&#xe3;o gosto</a>' : '<a href="'._UR_.'a/like.php?id='.$id.'&-a='.$a.'&ref=any&a=like_nwfCon" class="z">Gosto</a>';
					}else{

						return false;

					}

				break;

				case "comment":

					$vr_like = $this->query("SELECT id FROM likes WHERE id_user = '$u' AND id_post = '$id' AND a = '$a'");

					if($vr_like){

						return ($this->rowCount($vr_like) >= 1) ? '<a href="'._UR_.'a/unlike.php?id='.$id.'&-a='.$a.'&ref=any&a=like_nwfCon" class="strpgc-a-a-b-a-b-a-c-a-a">N&#xe3;o gosto</a>' : '<a href="'._UR_.'a/like.php?id='.$id.'&-a='.$a.'&ref=any&a=like_nwfCon" class="strpgc-a-a-b-a-b-a-c-a-a">Gosto</a>';

					}else{

						return false;

					}

				break;

			}


		}

		public function gnum_likes($id = null, $a = "post"){

			if(is_null($id)){
				return null;
			}

			$a = (is_string($a)) ? $a : "post";

			$u = __USER__;

			switch($a){

				case "post":

					$ft_like_request = $this->query("SELECT likes FROM posts WHERE id = '$id'");
					
					if ($ft_like = $this->fetch($ft_like_request)) {
						$likes = $ft_like->likes;

						$c_numbers = array("Uma", "Duas", "Três", "Quatro", "Cinco", "Ceis", "Sete", "Oito", "Nove");

						if(0 == $likes){

							return "";

						}elseif(isset($c_numbers[ $likes - 1 ])){

							$cNum = $c_numbers[ $likes - 1 ];

							return (($likes - 1) == 0) ? $cNum." pessoa gosta disto" : $cNum." pessoas gostam disto";

						}else{

							return $likes." Gostos";

						}
					}
					

				break;

			}

		}


		
	/*	public function __call(){
			echo "Wrong function";
		}
	*/

	}


