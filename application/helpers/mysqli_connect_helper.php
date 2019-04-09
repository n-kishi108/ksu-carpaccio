<?php
function _connect(){
	$json = file_get_contents(APPPATH.'db.json');
	$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
	$array = json_decode($json,true);
	$mysqli = new mysqli($array['host'], $array['username'], $array['password'], $array['database']);
	return $mysqli;
}
?>
