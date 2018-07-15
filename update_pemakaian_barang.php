<?php
include "koneksi.php";
$KodePengeluaran = $_POST['KodePengeluaran'];
$Jumlah = $_POST['Jumlah'];

$updatePemakaianBarang = "UPDATE pemakaian_barang set KodePengeluaran='$KodePengeluaran' , Jumlah='$Jumlah' where KodePengeluaran='$KodePengeluaran' ";

$updatePemakaianBarang_query = mysqli_query($connect,$updatePemakaianBarang);

if ($updatePemakaianBarang_query)
{
	header('location:halaman_utama.php?tabel_pemakaian_barang=$tabel_pemakaian_barang');
}
else
{
	echo "Update gagal dijalankan";
}

?>