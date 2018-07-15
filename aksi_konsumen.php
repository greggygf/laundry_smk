<body>
<?php
include "koneksi.php";
$KodeKonsumen = $_POST['KodeKonsumen'];
$aksi = strtolower($_POST['proses']);

if($aksi == "delete")
{

	$deleteKonsumen = "DELETE from konsumen where KodeKonsumen='$KodeKonsumen'";

	$deleteKonsumen_query = mysqli_query($connect,$deleteKonsumen);

	if ($deleteKonsumen_query)
	{
		echo "<br><hr color=`#0263A0`><br>	Delete berhasil dijalankan! Untuk melihat kembali data Konsumen,silakan klik"; ?><a href="halaman_utama.php?tabel_konsumen=$tabel_konsumen">  <input type="button" class="tombol" value="Back"></a>
		
	<?php
	}
	else
	{
		echo "Delete gagal dijalankan";
	}
}

else
{

$query=mysqli_query($connect,"select * from konsumen where KodeKonsumen='$KodeKonsumen'");
?>

<h2>Update Data Member</h2><hr color="#0263A0"><br>

 <form action="update_konsumen.php" method="POST">
        
     <table>
     
     <?php
	while($isi=mysqli_fetch_array($query)){
	?>
     
    <tr>
        <td>Kode Member</td>
    </tr>
    <tr>
        <td><input type="text" name='KodeKonsumen' size="25px" maxlength="5" value="<?php echo $KodeKonsumen;?>" style="color:#888;" readonly></td>
    </tr>
    
    <tr>
        <td>Nama Member</td>
    </tr>
    <tr>
        <td><input type="text" name="NmKonsumen" size="25px" maxlength="50" value="<?php echo $isi['NmKonsumen'];?>"></td>
    </tr>
    
    <tr>
        <td>Alamat Member</td>
    </tr>
    <tr>
        <td><textarea name="AlmtKonsumen" cols="27" rows="5"  ><?php echo $isi['AlmtKonsumen'];?></textarea></td>
    </tr>
    
        <tr>
        <td>No.Handphone</td>
    </tr>
    <tr>
        <td><input type="text" name="TelpKonsumen" size="25px" value="<?php echo $isi['TelpKonsumen'];?>" ></td>
    </tr>
    <tr>
    	<td><br><input class="tombol" type="submit" value="Update" size="25px" ></td>
   	</tr>
    
     <?php } ?>
</table>

</form>
<?php
}

?>