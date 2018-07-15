<?php
include "koneksi.php";
$IDJenisPakaian = $_POST['IDJenisPakaian'];
$NmPakaian = $_POST['NmPakaian'];
$tarif = $_POST['tarif'];
$IDJenisLaundry = $_POST['IDJenisLaundry'];

$updateTarif = "UPDATE tarif set IDJenisPakaian='$IDJenisPakaian' , NmPakaian='$NmPakaian' , tarif='$tarif', IDJenisLaundry='$IDJenisLaundry' where IDJenisPakaian='$IDJenisPakaian'";

$updateTarif_query = mysqli_query($connect,$updateTarif);

if ($updateTarif_query)
{
	header('location:halaman_utama.php?tabel_tarif=$tabel_tarif');
}
else
{
	echo "Insert gagal dijalankan";
}

?>