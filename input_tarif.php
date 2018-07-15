<?php
include "koneksi.php";
$IDJenisPakaian = $_POST['IDJenisPakaian'];
$NmPakaian = $_POST['NmPakaian'];
$tarif = $_POST['tarif'];
$IDJenisLaundry = $_POST['IDJenisLaundry'];

$insertTarif = "INSERT INTO tarif values ('$IDJenisPakaian','$NmPakaian','$tarif','$IDJenisLaundry')";

$insertTarif_query = mysqli_query($connect,$insertTarif);

if ($insertTarif_query)
{
	echo "Pendaftaran Berhasil!";
	header('location:halaman_utama.php?tabel_tarif=$tabel_tarif');
}
else
{
	echo "Insert gagal dijalankan";
}

?>