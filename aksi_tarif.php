<body>
<?php
include "koneksi.php";
$aksi = strtolower($_POST['proses']);
$IDJenisPakaian = $_POST['IDJenisPakaian'];


if($aksi == "delete")
{
	
	$deleteTarif = "DELETE from tarif where IDJenisPakaian='$IDJenisPakaian'";

	$deleteTarif_query = mysqli_query($connect,$deleteTarif);

	if ($deleteTarif_query)
	{
		echo "<br><hr color=`#0263A0`><br>	Delete berhasil dijalankan! Untuk melihat kembali data Tarif,silakan klik"; ?><a href="halaman_utama.php?tabel_tarif=$tabel_tarif">  <input type="button" class="tombol" value="Back"></a>
		
	<?php
	}
	else
	{
		echo "Delete gagal dijalankan";
	}
}

else
{

$query=mysqli_query($connect,"select * from tarif where IDJenisPakaian='$IDJenisPakaian'");
?>

 <form action="update_tarif.php" method="POST">
 
 <h2>Update Data Tarif</h2><hr color="#0263A0"><br>
        
     <table>
     
     	<?php
	while($isi=mysqli_fetch_array($query)){
	?>
     
    <tr>
        <td>ID Jenis Pakaian</td>
    </tr>
    <tr>
        <td><input type="text" name='IDJenisPakaian' size="25px" maxlength="10" style="color:#888;" value="<?php echo $IDJenisPakaian; ?>" readonly></td>
    </tr>
    
    <tr>
        <td>Nama Pakaian</td>
    </tr>
    <tr>
        <td><input type="text" name="NmPakaian" size="25px" maxlength="50" value="<?php echo $isi['NmPakaian']; ?>"></td>
    </tr>
    
    <tr>
        <td>Tarif</td>
    </tr>
    <tr>
        <td><input type="text" name="tarif" size="25px" maxlength="7" value="<?php echo $isi['tarif']; ?>"></td>
    </tr>
    
        <tr>
        <td>Jenis Laundry</td>
    </tr>
    <tr>
        <td><select name="IDJenisLaundry">
        <?php if ($isi['IDJenisLaundry'] == "c") { ?>
        
	<option value="c" selected>Cuci</option>
    <option value="ck">Cuci Kering</option>
    <option value="cks">Cuci Kering Setrika</option>
    
    <?php ;} else if ($isi['IDJenisLaundry'] == "ck") { ?>
    
    <option value="c">Cuci</option>
    <option value="ck" selected>Cuci Kering</option>
    <option value="cks">Cuci Kering Setrika</option>
    
    <?php ;} else { ?>
    
    <option value="c">Cuci</option>
    <option value="ck">Cuci Kering</option>
    <option value="cks" selected>Cuci Kering Setrika</option>
    
    <?php ;} ?>
    
    </td>
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