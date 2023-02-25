<?php 

include_once (dirname(__FILE__)."/-ex_conn.php");
include_once (dirname(__FILE__)."/-ex_functions.php");


$componentsDir = join(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'html', 'components']);
$helpersDir = join(DIRECTORY_SEPARATOR, [__DIR__, 'helpers']);

$componentsFileRe = join(DIRECTORY_SEPARATOR, [$componentsDir, '*.php']);
$helpersFileRe = join(DIRECTORY_SEPARATOR, [$helpersDir, '*.php']);

$componentsFileList = array_merge (
	@glob ($componentsFileRe),
	@glob ($helpersFileRe)
);

if (is_array ($componentsFileList) && $componentsFileList) {
	foreach ($componentsFileList as $componentFilePath) {
		include_once $componentFilePath;
	}
}

const _LDIR_ = "/blog/";
const _UR_ = "http://localhost"._LDIR_;

define('APP_PATH_PREFIX', '/blog/');
define('BASE_URL', 'http://localhost' . APP_PATH_PREFIX);
define('ROOT_DIR', dirname(dirname(dirname(__DIR__))));

$_USER_ = (isset($_SESSION[$usercookie_name])) ? $_SESSION[$usercookie_name] : undefined;

define("__USER__", $_USER_);

require_once (dirname(__FILE__)."/-ex_authPages.php");

$Page = undefined;

