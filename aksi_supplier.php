<body>
<?php
include "koneksi.php";
$aksi = strtolower($_POST['proses']);
$IDSupplier = $_POST['IDSupplier'];


if($aksi == "delete")
{
	
	$deleteSupplier = "DELETE from supplier where IDSupplier='$IDSupplier'";

	$deleteSupplier_query = mysqli_query($connect,$deleteSupplier);

	if ($deleteSupplier_query)
	{
		echo "<br><hr color=`#0263A0`><br>	Delete berhasil dijalankan! Untuk melihat kembali data Supplier,silakan klik"; ?><a href="halaman_utama.php?tabel_supplier=$tabel_supplier">  <input type="button" class="tombol" value="Back"></a>
		
	<?php
	}
	else
	{
		echo "Delete gagal dijalankan";
	}
}

else
{

$query=mysqli_query($connect,"select * from supplier where IDSupplier='$IDSupplier'");
?>

 <form action="update_supplier.php" method="POST">
 
 <h2>Update Data Supplier</h2><hr color="#0263A0"><br>
        
     <table>
     
    <?php
	while($isi=mysqli_fetch_array($query)){
	?>
     
    <tr>
        <td>Kode Supplier</td>
    </tr>
    <tr>
        <td><input type="text" name='IDSupplier' size="25px" maxlength="10" style="color:#888;" value="<?php echo $IDSupplier;?>" readonly></td>
    </tr>
    
    <tr>
        <td>Nama Supplier</td>
    </tr>
    <tr>
        <td><input type="text" name="NmSupplier" size="25px" value="<?php echo $isi['NmSupplier'];?>"></td>
    </tr>
    
    <tr>
        <td>Alamat Supplier</td>
    </tr>
    <tr>
        <td><textarea name="AlmtSupplier" cols="27" rows="5" ><?php echo $isi['AlmtSupplier'];?></textarea></td>
    </tr>
    
        <tr>
        <td>No.Handphone</td>
    </tr>
    <tr>
        <td><input type="text" name="TelpSupplier" size="25px" value="<?php echo $isi['TelpSupplier'];?>"></td>
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