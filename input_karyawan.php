<?php
include "koneksi.php";
$NIK = $_POST['NIK'];
$NmKaryawan = $_POST['NmKaryawan'];
$AlmtKaryawan = $_POST['AlmtKaryawan'];
$TelpKaryawan = $_POST['TelpKaryawan'];
$GenderKaryawan = $_POST['GenderKaryawan'];

$insertKaryawan = "INSERT INTO karyawan values ('$NIK','$NmKaryawan','$AlmtKaryawan','$TelpKaryawan','$GenderKaryawan')";

$insertKaryawan_query = mysqli_query($connect,$insertKaryawan);

if ($insertKaryawan_query)
{
	echo "Pendaftaran Berhasil!";
	header('location:halaman_utama.php?tabel_karyawan=$tabel_karyawan');
}
else
{
	echo "Insert gagal dijalankan";
}

?>