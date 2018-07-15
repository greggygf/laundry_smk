<?php
include "koneksi.php";
$IDSupplier = $_POST['IDSupplier'];
$NmSupplier = $_POST['NmSupplier'];
$AlmtSupplier = $_POST['AlmtSupplier'];
$TelpSupplier = $_POST['TelpSupplier'];

$updateSupplier = "UPDATE supplier set IDSupplier='$IDSupplier' , NmSupplier='$NmSupplier' , AlmtSupplier='$AlmtSupplier' , TelpSupplier='$TelpSupplier' where IDSupplier='$IDSupplier'";

$updateSupplier_query = mysqli_query($connect,$updateSupplier);

if ($updateSupplier_query)
{
	header('location:halaman_utama.php?tabel_supplier=$tabel_supplier');
}
else
{
	echo "Update gagal dijalankan";
}

?>