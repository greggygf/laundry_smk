<body>
<?php
include "koneksi.php";
$aksi = strtolower($_POST['proses']);
$IDJenisLaundry = $_POST['IDJenisLaundry'];


if($aksi == "delete")
{
	
	$deleteIDJenisLaundry = "DELETE from jenis_laundry where IDJenisLaundry='$IDJenisLaundry'";

	$deleteIDJenisLaundry_query = mysqli_query($connect,$deleteIDJenisLaundry);

	if ($deleteIDJenisLaundry_query)
	{
		echo "<br><hr color=`#0263A0`><br>	Delete berhasil dijalankan! Untuk melihat kembali data Jenis Laundry,silakan klik"; ?><a href="halaman_utama.php?tabel_jenislaundry=$tabel_jenislaundry">  <input type="button" class="tombol" value="Back"></a>
		
	<?php
	}
	else
	{
		echo "Delete gagal dijalankan";
	}
}

else
{

include "koneksi.php";

$query=mysqli_query($connect,"select * from jenis_laundry where IDJenisLaundry='$IDJenisLaundry'");
?>

 <h2>Update Data Jenis Laundry</h2><hr color="#0263A0"><br>
 <form action="update_jenislaundry.php" method="POST">
 
     <table>
    <?php
	while($isi=mysqli_fetch_array($query)){
	?>
    <tr>
        <td>ID Jenis Laundry</td>
    </tr>
    <tr>
        <td><input type="text" name='IDJenisLaundry' size="25px" value="<?php echo $IDJenisLaundry;?>" maxlength="5" style="color:#888;" readonly></td>
    </tr>
    
    <tr>
        <td>Nama Jenis Laundry</td>
    </tr>
    <tr>
        <td><input type="text" name="NmJenisLaundry" size="25px" value="<?php echo $isi['NmJenisLaundry'];?>" maxlength="20"></td>
    </tr>
    
    <tr>
    	<td><br><input class="tombol" type="submit" value="Update"></td>
   	</tr>
 <?php } ?>   
</table>


</form>
<?php
}
?>