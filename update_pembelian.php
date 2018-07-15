<?php
include "koneksi.php";
$NoPembelian = $_POST['NoPembelian'];
$TglPembelian = $_POST['TglPembelian'];
$TotalBiaya = $_POST['TotalBiaya'];

$updatePembelian = "UPDATE pembelian set NoPembelian='$NoPembelian' , TglPembelian='$TglPembelian' , TotalBiaya='$TotalBiaya' where NoPembelian='$NoPembelian' ";

$updatePembelian_query = mysqli_query($connect,$updatePembelian);

if ($updatePembelian_query)
{
	echo "Pendaftaran Berhasil!";
	header('location:halaman_utama.php?tabel_pembelian=$tabel_pembelian');
}
else
{
	echo "Insert gagal dijalankan";
}

?>