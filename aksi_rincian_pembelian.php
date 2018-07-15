<body>
<?php

include "koneksi.php";
$NoRincian = $_POST['NoRincian'];
$aksi = strtolower($_POST['proses']);

if($aksi == "delete")
{
	
	$deleteRincian_pembelian = "DELETE from rincian_pembelian where NoRincian='$NoRincian'";

	$deleteRincian_pembelian_query = mysqli_query($connect,$deleteRincian_pembelian);

	if ($deleteRincian_pembelian_query)
	{
		echo "<br><hr color=`#0263A0`><br>	Delete berhasil dijalankan! Untuk melihat kembali data rincian pembelian,silakan klik"; ?><a href="halaman_utama.php?tabel_rincian_pembelian=$tabel_rincian_pembelian">  <input type="button" class="tombol" value="Back"></a>
		
	<?php
	}
	else
	{
		echo "Delete gagal dijalankan";
	}
}
else 
{
	$query=mysqli_query($connect,"select * from rincian_pembelian where NoRincian='$NoRincian'");
	$query3=mysqli_query($connect,"select NmBarang from barang b,rincian_pembelian r where r.KodeBarang = b.KodeBarang AND NoRincian='$NoRincian'");
?>

 
 <form action="update_rincian_pembelian.php" method="POST">
        
     <h2>Update Data Rincian Pembelian</h2><hr color="#0263A0"><br>
     <table>
     
    <?php
	while($isi=mysqli_fetch_array($query)){
	?>
    
    <tr>
        <td>No Rincian</td>
    </tr>
    
    <tr>
        <td><input type="text" name='NoRincian' size="25px" maxlength="20" value="<?php echo $isi['NoRincian'];?>" style="color:#888;" readonly></td>
    </tr>
    
    <tr>
        <td>No Pembelian</td>
    </tr>
    <tr>
        <td><input type="text" name='NoPembelian' size="25px" maxlength="20" value="<?php echo $isi['NoPembelian'];?>" style="color:#888;" readonly></td>
    </tr>
    
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