<?php
include "koneksi.php";
$KodeKonsumen = $_POST['KodeKonsumen'];
$NmKonsumen = $_POST['NmKonsumen'];
$AlmtKonsumen = $_POST['AlmtKonsumen'];
$TelpKonsumen = $_POST['TelpKonsumen'];

$updateKonsumen = "UPDATE konsumen set KodeKonsumen='$KodeKonsumen' , NmKonsumen='$NmKonsumen' , AlmtKonsumen='$AlmtKonsumen' , TelpKonsumen='$TelpKonsumen' where KodeKonsumen='$KodeKonsumen'";

$updateKonsumen_query = mysqli_query($connect,$updateKonsumen);

if ($updateKonsumen_query)
{
	header('location:halaman_utama.php?tabel_konsumen=$tabel_konsumen');
}
else
{
	echo "Update gagal dijalankan";
}

?>