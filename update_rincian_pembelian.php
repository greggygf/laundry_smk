<?php
include "koneksi.php";
$NoRincian = $_POST['NoRincian'];
$NoPembelian = $_POST['NoPembelian'];
$Jumlah = $_POST['Jumlah'];

$updateRincian_pembelian = "UPDATE rincian_pembelian set NoRincian='$NoRincian' , NoPembelian='$NoPembelian' , Jumlah='$Jumlah' where NoRincian='$NoRincian' ";

$updateRincian_pembelian_query = mysqli_query($connect,$updateRincian_pembelian);

if ($updateRincian_pembelian_query)
{
	echo "Pendaftaran Berhasil!";
	header('location:halaman_utama.php?tabel_rincian_pembelian=$tabel_rincian_pembelian');
}
else
{
	echo "Update gagal dijalankan";
}

?>