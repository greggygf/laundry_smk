<?php
	include "koneksi.php";
	$username=$_POST['username']; // simpan data username dari form ke variabel
	$password=$_POST['password']; // simpan data password dari form ke variabel
	$login="SELECT username,password,TypeUser FROM login WHERE username='$username' AND BINARY
	password='$password'";
	
	$login_query=mysqli_query($connect,$login);
	$data=mysqli_fetch_array($login_query);
	
	if($data)
	{
		session_start();
		$_SESSION['username'] = $data['username'];
		$_SESSION['password'] = $data['password'];
		$_SESSION['TypeUser'] = $data['TypeUser'];
		header('location:halaman_utama.php?beranda=$beranda');
	}
	else
	{
		echo "
		<script type='text/javascript'>
		alert('Username atau Password anda salah!')
		window.location='index.php';
		</script>";
		
		
	}
?>