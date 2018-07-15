<?php
include "koneksi.php";
$IDJenisLaundry = $_POST['IDJenisLaundry'];
$NmJenisLaundry = $_POST['NmJenisLaundry'];

$insertJenisLaundry = "INSERT INTO jenis_laundry values ('$IDJenisLaundry','$NmJenisLaundry')";

$insertJenisLaundry_query = mysqli_query($connect,$insertJenisLaundry);

if ($insertJenisLaundry_query)
{
	echo "Pendaftaran Berhasil!";
	header('location:halaman_utama.php?tabel_jenislaundry=$tabel_jenislaundry');
}
else
{
	echo "Insert gagal dijalankan";
}

?>