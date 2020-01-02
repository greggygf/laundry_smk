<?php
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "jasa_laundry";
	
	$connect = mysqli_connect($host,$user,$password,$database) or die (mysqli_error($connect));
?>