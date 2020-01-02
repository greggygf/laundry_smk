<?php
include "../../config/koneksi.php";
$NoTransaksi = $_POST['NoTransaksi'];
$TglTransaksi = $_POST['TglTransaksi'];
$TglAmbil = $_POST['TglAmbil'];
$Diskon = $_POST['Diskon'];

$updateTransaksi = "UPDATE transaksi set NoTransaksi='$NoTransaksi' , TglTransaksi='$TglTransaksi' , TglAmbil='$TglAmbil' , Diskon='$Diskon' where NoTransaksi='$NoTransaksi' ";

$updateTransaksi_query = mysqli_query($connect,$updateTransaksi);

if ($updateTransaksi_query)
{
	echo "Pendaftaran Berhasil!";
	header('location:../../module/halaman_utama.php?tabel_transaksi=$tabel_transaksi');
}
else
{
	echo "Insert gagal dijalankan";
}

?>