<?php
include "koneksi.php";
$KodeBarang = $_POST['KodeBarang'];
$NmBarang = $_POST['NmBarang'];
$Stok = $_POST['Stok'];
$TglUpdateStok = $_POST['TglUpdateStok'];

$insertBarang = "UPDATE barang set KodeBarang='$KodeBarang' , NmBarang='$NmBarang' , Stok='$Stok' , TglUpdateStok='$TglUpdateStok' where KodeBarang='$KodeBarang' ";

$insertBarang_query = mysqli_query($connect,$insertBarang);

if ($insertBarang_query)
{
	echo "Pendaftaran Berhasil!";
	header('location:halaman_utama.php?tabel_barang=$tabel_barang');
}
else
{
	echo "Insert gagal dijalankan";
}

?>