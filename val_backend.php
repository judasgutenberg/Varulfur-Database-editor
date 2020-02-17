<?php 
//valrulfur backend.  
//gus mueller, begun feb 17 2020
//////////////////////////////////////////////////////////////
 
 
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


$mode = "";
$table = "";
$database = "";
$column = "";
$fromArray = $_REQUEST;
$constantsPath = "val_constants.json";
$constantsString = file_get_contents($constantsPath);
$config = [];
if($constantsString != "") {
	$config = json_decode($constantsString);

}

if($fromArray && getFromArray("mode", $fromArray)) {
	$mode = getFromArray($fromArray, "mode");
 	$database = getFromArray($fromArray, "database");
	$table = getFromArray($fromArray, "table");
	if($mode == "getTableInfo") {
		$out = $sql->query("EXPLAIN " . addDatabaseIfNecessary($strDatabase, $strTable)  );
	
	}
}

echo (json_encode($out));


function getFromArray($key, $array, $ifNothing="") {
	if(array_key_exists("mode", $fromArray)) {
		return $fromArray[$key];
	}
	return $ifNothing;

}