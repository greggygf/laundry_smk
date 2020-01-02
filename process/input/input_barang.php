<?php
include "../../config/koneksi.php";
$KodeBarang = $_POST['KodeBarang'];
$NmBarang = $_POST['NmBarang'];
$Stok = $_POST['Stok'];
$TglUpdateStok = $_POST['TglUpdateStok'];

$insertBarang = "INSERT INTO barang values ('$KodeBarang','$NmBarang','$Stok','$TglUpdateStok')";

$insertBarang_query = mysqli_query($connect,$insertBarang);

if ($insertBarang_query)
{
	echo "Pendaftaran Berhasil!";
	header ('location:../../module/halaman_utama.php?tabel_barang=$tabel_barang');
}
else
{
	echo "Insert gagal dijalankan";
}

?>