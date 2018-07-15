<?php
include "koneksi.php";
$NIK = $_POST['NIK'];
$username = $_POST['username'];
$password = $_POST['password'];
$TypeUser = $_POST['TypeUser'];

$updateLogin = "UPDATE login set NIK='$NIK' , username='$username' , password='$password' , TypeUser='$TypeUser' where NIK='$NIK'";

$updateLogin_query = mysqli_query($connect,$updateLogin);

if ($updateLogin_query)
{
	header('location:halaman_utama.php?tabel_login=$tabel_login');
}
else
{
	echo "Update gagal dijalankan";
}

?>