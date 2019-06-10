<body>
<?php

include "koneksi.php";
$IDRincian = $_POST['IDRincian'];
$aksi = strtolower($_POST['proses']);

if($aksi == "delete")
{
	
	$deleteRincian_transaksi= "DELETE from rincian_transaksi where IDRincian='$IDRincian'";

	$deleteRincian_transaksi_query = mysqli_query($connect,$deleteRincian_transaksi);

	if ($deleteRincian_transaksi_query)
	{
		echo "<br><hr color=`#0263A0`><br>	Delete berhasil dijalankan! Untuk melihat kembali data rincian transaksi,silakan klik"; ?><a href="halaman_utama.php?tabel_rincian_transaksi=$tabel_rincian_transaksi">  <input type="button" class="tombol" value="Back"></a>
		
	<?php
	}
	else
	{
		echo "Delete gagal dijalankan";
	}
}
else 
{
	$query=mysqli_query($connect,"select * from rincian_transaksi where IDRincian='$IDRincian'");
	$query3=mysqli_query($connect,"select NmPakaian from tarif t,rincian_transaksi r where t.IDJenisPakaian = r.IDJenisPakaian AND IDRincian='$IDRincian'");
?>

 
 <form action="update_pemakaian_barang.php" method="POST">
        
     <h2>Update Data Rincian Transaksi</h2><hr color="#0263A0"><br>
     <table>
     
    <?php
	while($isi=mysqli_fetch_array($query)){
	?>
    
    <tr>
        <td>ID Rincian</td>
    </tr>
    
    <tr>
        <td><input type="text" name='IDRincian' size="25px" maxlength="20" value="<?php echo $IDRincian;?>" style="color:#888;" readonly></td>
    </tr>
    
    <tr>
        <td>No Transaksi</td>
    </tr>
    <tr>
        <td><input type="text" name='NoTransaksi' size="25px" maxlength="20" value="<?php echo $isi['NoTransaksi'];?>" style="color:#888;" readonly></td>
    </tr>
    
    <?php
	while($isi3=mysqli_fetch_array($query3)){
	?>
    
    <tr>
        <td>Nama Pakaian</td>
    </tr>
    
    <tr>
        <td><input type="text" name='NmPakaian' size="25px" maxlength="20" value="<?php echo $isi3['NmPakaian'];?>" style="color:#888;" readonly></td>
    </tr>
    
    <?php } ?>
    
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