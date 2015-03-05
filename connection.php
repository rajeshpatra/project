<?php
	session_start();
	require "constants.php";
	$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
		if(!$connection){
			die ("could not connect to db." . mysql_error());
		}else{
			echo "db connection successfull";
		}

	$db = mysql_select_db(DB_NAME, $connection);
		if(!$db){
			die ("could not select db." . mysql_error());
		}else{
			echo "db selection successfull";
		}
?>