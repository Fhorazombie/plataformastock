<?php 

	$host = "localhost";
	$user = "EmpresaFamosa";
	$pass = "123";
	$db = "EmpresaFamosa";


	$connect = new mysqli($host, $user, $pass, $db) or die("Error" . mysql_error($connect));

?>