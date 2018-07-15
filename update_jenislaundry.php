<?php
include "koneksi.php";
$IDJenisLaundry = $_POST['IDJenisLaundry'];
$NmJenisLaundry = $_POST['NmJenisLaundry'];

$updateJenisLaundry = "UPDATE jenis_laundry set IDJenisLaundry='$IDJenisLaundry' , NmJenisLaundry='$NmJenisLaundry' where IDJenisLaundry='$IDJenisLaundry'";

$updateJenisLaundry_query = mysqli_query($connect,$updateJenisLaundry);

if ($updateJenisLaundry_query)
{
	header('location:halaman_utama.php?tabel_jenislaundry=$tabel_jenislaundry');
}
else
{
	echo "Update gagal dijalankan";
}

?>