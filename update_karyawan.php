<?php
include "koneksi.php";
$NIK = $_POST['NIK'];
$NmKaryawan = $_POST['NmKaryawan'];
$AlmtKaryawan = $_POST['AlmtKaryawan'];
$TelpKaryawan = $_POST['TelpKaryawan'];
$GenderKaryawan = $_POST['GenderKaryawan'];

$updateKaryawan = "UPDATE karyawan set NIK='$NIK' , NmKaryawan='$NmKaryawan' , AlmtKaryawan='$AlmtKaryawan' , TelpKaryawan='$TelpKaryawan' , GenderKaryawan='$GenderKaryawan' where NIK='$NIK'";

$updateKaryawan_query = mysqli_query($connect,$updateKaryawan);

if ($updateKaryawan_query)
{
	header('location:halaman_utama.php?tabel_karyawan=$tabel_karyawan');
}
else
{
	echo "Update gagal dijalankan";
}

?>