<body>
<?php

include "koneksi.php";
$KodePengeluaran = $_POST['KodePengeluaran'];
$aksi = strtolower($_POST['proses']);

if($aksi == "delete")
{
	
	$deletePemakaian_Barang = "DELETE from pemakaian_barang where KodePengeluaran='$KodePengeluaran'";

	$deletePemakaian_Barang_query = mysqli_query($connect,$deletePemakaian_Barang);

	if ($deletePemakaian_Barang_query)
	{
		echo "<br><hr color=`#0263A0`><br>	Delete berhasil dijalankan! Untuk melihat kembali data pemakaian barang,silakan klik"; ?><a href="halaman_utama.php?tabel_pemakaian_barang=$tabel_pemakaian_barang">  <input type="button" class="tombol" value="Back"></a>
		
	<?php
	}
	else
	{
		echo "Delete gagal dijalankan";
	}
}
else 
{
	$query=mysqli_query($connect,"select * from pemakaian_barang where KodePengeluaran='$KodePengeluaran'");
	$query2=mysqli_query($connect,"select NmKaryawan from karyawan k,pemakaian_barang p where p.NIK = k.NIK AND KodePengeluaran='$KodePengeluaran'");
	$query3=mysqli_query($connect,"select NmBarang from barang b,pemakaian_barang p where p.KodeBarang = b.KodeBarang AND KodePengeluaran='$KodePengeluaran'");
?>

 
 <form action="update_pemakaian_barang.php" method="POST">
        
     <h2>Update Data Pemakaian Barang</h2><hr color="#0263A0"><br>
     <table>
     
    <?php
	while($isi=mysqli_fetch_array($query)){
	?>
    
    <?php
	while($isi2=mysqli_fetch_array($query2)){
	?>
    
    <tr>
        <td>Nama Karyawan</td>
    </tr>
    
    <tr>
        <td><input type="text" name='NmKaryawan' size="25px" maxlength="20" value="<?php echo $isi2['NmKaryawan'];?>" style="color:#888;" readonly></td>
    </tr>
    
	<?php } ?>
    
    <?php
	while($isi3=mysqli_fetch_array($query3)){
	?>
    
    <tr>
        <td>Nama Barang</td>
    </tr>
    
    <tr>
        <td><input type="text" name='NamaBarang' size="25px" maxlength="20" value="<?php echo $isi3['NmBarang'];?>" style="color:#888;" readonly></td>
    </tr>
    
    <?php } ?>

    <tr>
        <td>Kode Pengeluaran</td>
    </tr>
    <tr>
        <td><input type="text" name='KodePengeluaran' size="25px" maxlength="20" value="<?php echo $KodePengeluaran;?>" style="color:#888;" readonly></td>
    </tr>
    
    <tr>
        <td>Jumlah</td>
    </tr>
    <tr>
        <td><input type="text" name="Jumlah" size="25px" maxlength="50" value="<?php echo $isi['Jumlah'];?>"></td>
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