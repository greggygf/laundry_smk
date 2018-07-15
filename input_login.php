<?php
include "koneksi.php";
$NIK = $_POST['NIK'];
$username = $_POST['username'];
$password = $_POST['password'];
$TypeUser = $_POST['TypeUser'];

$insertLogin = "INSERT INTO login values ('$username','$password','$TypeUser','$NIK')";

$insertLogin_query = mysqli_query($connect,$insertLogin);

if ($insertLogin_query)
{
	header('location:halaman_utama.php?tabel_login=$tabel_login');
}
else
{
	echo "Insert gagal dijalankan";
}

?>