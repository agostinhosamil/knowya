<?php 

	include_once (dirname(dirname(dirname(dirname(dirname(__FILE__)))))."/https/p/php/-ex_Conf.php");

	(isset($nwf) && is_object($nwf) && defined("__USER__")) or exit("ERROR GRAVE...");

	(count($_GET) >= 3) or exit("Missing informations");

	(isset($_GET["src"])) or exit("Error while getting the sent informations");

	$src = (is_numeric($_GET["src"])) ? stripslashes($_GET["src"]) : urldecode($_GET["src"]);

	$View = (isset($_GET["view"]) && !empty($_GET["view"]) && !is_numeric($_GET["view"])) ? strip_tags(stripslashes(trim($_GET["view"]))) : "normal";

	$P_exts = array(".jpg", "jpeg");

  $imageSourceFilePath = join(DIRECTORY_SEPARATOR, [ROOT_DIR, str_replace(BASE_URL, '', $src)]);
  
  if (!is_file ($imageSourceFilePath)) {
    exit ('<h1>Image not found!!!!</h1>');
  }

  $imageOriginalSizeData = getimagesize($imageSourceFilePath);

  function validSizeData ($data) {
    if (isset ($_GET[$data]) && is_numeric ($_GET[$data])) {
      return (int)stripslashes($_GET[$data]);
    }
  }

	list ($w, $h) = $imageOriginalSizeData;

  if ($requestImageWidth = validSizeData ('width')) {
    $w = $requestImageWidth;
  }

  if ($requestImageHeight = validSizeData ('height')) {
    $h = $requestImageHeight;
  }

	$a = explode("?", $src)[ 0 ];
	$b = explode("/", $a);
	$c = $b[ count($b) - 1 ];
	$ext = strtolower(substr($c, -4));

	
	if(!(in_array($ext, $P_exts))){
		exit("Extension is not supported");
	}

  /*  */

	list($nw, $nh) = getimagesize($src);

	if(defined("__PPATH__")){

		$im = null;

		$filext = null;

		if (@imagecreatefromjpeg($src)) {

			header("content-type: image/jpeg");
			$im = (imagecreatefromjpeg($src));

			$filext = 1;

		} else {

			header("content-type: image/png");
			$im = imagecreatefrompng($src);

			$filext = 2;

		}

		$img = imagecreatetruecolor($w, $h);

		switch($View){

			case "normal":

				$dst_x = imagesx($img);
				$dst_y = imagesy($img);

				$x = imagesx($im);
				$y = imagesy($im);

				imagecopyresampled($img, $im, 0, 0, 0, 0, $w, $h, $nw, $nh);

				break;

			case "thumb":

				$dst_x = imagesx($img);
				$dst_y = imagesy($img);

				$x = (($w / 2) - ($nw / 2));
				$y = (($h / 2) - ($nh / 2));

				$new_img = imagecrop($im, array(
          "x" => $x,
          "y" => $y,
          "width" => $w,
          "height" => $h
        ));

				imagecopyresampled($img, $im, 0, 0, 0, 0, $w, $h, $w, $h);

				break;

		}

		if ($filext === 1) {
			imagejpeg($img);
		} elseif ($filext === 2) {
			imagepng($img);
		}

		imagedestroy($img);
		imagedestroy($im);

	}else{
		echo "LA";
	}

	/* */
