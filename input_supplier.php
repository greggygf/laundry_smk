<?php
include "koneksi.php";
$IDSupplier = $_POST['IDSupplier'];
$NmSupplier = $_POST['NmSupplier'];
$AlmtSupplier = $_POST['AlmtSupplier'];
$TelpSupplier = $_POST['TelpSupplier'];

$insertSupplier = "INSERT INTO supplier values ('$IDSupplier','$NmSupplier','$AlmtSupplier','$TelpSupplier')";

$insertSupplier_query = mysqli_query($connect,$insertSupplier);

if ($insertSupplier_query)
{
	echo "Pendaftaran Berhasil!";
	header('location:halaman_utama.php?tabel_supplier=$tabel_supplier');
}
else
{
	echo "Insert gagal dijalankan";
}

?>