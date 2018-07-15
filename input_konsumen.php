<?php
include "koneksi.php";
$KodeKonsumen = $_POST['KodeKonsumen'];
$NmKonsumen = $_POST['NmKonsumen'];
$AlmtKonsumen = $_POST['AlmtKonsumen'];
$TelpKonsumen = $_POST['TelpKonsumen'];

$insertKonsumen = "INSERT INTO konsumen values ('$KodeKonsumen','$NmKonsumen','$AlmtKonsumen','$TelpKonsumen')";

$insertKonsumen_query = mysqli_query($connect,$insertKonsumen);

if ($insertKonsumen_query)
{
	echo "Pendaftaran Berhasil!";
	header('location:halaman_utama.php?tabel_konsumen=$tabel_konsumen');
}
else
{
	echo "Insert gagal dijalankan";
}

?>