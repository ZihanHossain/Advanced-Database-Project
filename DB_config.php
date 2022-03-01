<?php

	// $conn = '';
	function getConnection(){
		
		$conn=oci_connect("MID_PROJECT","project","localhost/XE");
		return $conn;
	}

	// if(getConnection())
	// {
	// 	echo $conn;
	// 	echo 'Connected';
	// }
	// else
	// {
	// 	echo $conn;
	// 	$e= oci_error();
	// 	echo $e['message'];
	// }
?>