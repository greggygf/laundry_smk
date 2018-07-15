<?php
include "koneksi.php";
$IDRincian = $_POST['IDRincian'];
$NoTransaksi = $_POST['NoTransaksi'];
$Jumlah = $_POST['Jumlah'];

$updateRincian_transaksi = "UPDATE rincian_transaksi set IDRincian='$IDRincian' , NoTransaksi='$NoTransaksi' , Jumlah='$Jumlah' where IDRincian='$IDRincian' ";

$updateRincian_transaksi_query = mysqli_query($connect,$updateRincian_transaksi);

if ($updateRincian_transaksi_query)
{
	echo "Pendaftaran Berhasil!";
	header('location:halaman_utama.php?tabel_rincian_transaksi=$tabel_rincian_transaksi');
}
else
{
	echo "Update gagal dijalankan";
}

?>