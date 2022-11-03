<?php

	date_default_timezone_set('America/Mexico_City');

	require ("funct.php");
	$link = Conectarse();
	mysql_select_db("tracker") or die('No se pudo seleccionar la base de datos');


	$file = "gps-position-team1.txt";


	if ( isset($_GET["lat"]) && preg_match("/^-?\d+.\d+$/", $_GET["lat"])
		&& isset($_GET["lon"]) && preg_match("/^-?\d+.\d+$/", $_GET["lon"]) ) {
			$f = fopen($file,"w");
			fputs($f,date("Y-m-d"."_"."H:i:s")."_".$_GET["lat"]."_".$_GET["lon"]);
			fclose($f);
			echo "Ok";
	}
	else{
		header('Location: index.php');
	} 


	$date1 = $lat1 = $lon1 = $time1 = '';

	$date_lat_lon1 = rtrim(file_get_contents("gps-position-team1.txt"));


	if ($date_lat_lon1) {
		list($date1, $time1, $lat1, $lon1) = explode("_", $date_lat_lon1);
		mysql_query("INSERT INTO `tracker` VALUES ('1','$date1', '$time1', '$lat1', '$lon1')");
		mysql_close($link);
	}

?>
