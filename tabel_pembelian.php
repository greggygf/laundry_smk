<h2>Daftar Data Pembelian</h2><hr color="#0263A0"><br>

<form action="halaman_utama.php?tabel_pembelian=$tabel_pembelian" method="post">
   <input type="search" name="cari" placeholder="Pencarian Data Pembelian" class="css-input" style="width:250px;" />
   <button type="submit" name="pencarian" value="Cari" class="btn" style="padding:3px;" margin="6px;" width="10px;"><img src="animasi/search.png" height="10" width="12"></button>
</form>
<font size="1">Catatan : Jika mencari data dalam <u>Tanggal</u>,maka formatnya adalah <b>YYYY-MM-DD</b></font>
<br>
<br>

<table id="daftar-table" border='1' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
    	<th class="short">NO</th>
		<th class="normal">NO PEMBELIAN</th>
		<th class="normal">TGL PEMBELIAN</th>
		<th class="normal">TOTAL</th>
		<th class="normal">ID SUPPLIER</th>
        <th class="normal">NIK</th>
        <?php 
		if($_SESSION['TypeUser']!=="user")
		{ ?>
        <th class="normal">TOOLS</th>
        <?php } ?>
	</tr>
	<?php
	include "koneksi.php";
	$tampilkan_isi = "select * from `pembelian`";
	
	if(isset($_POST['pencarian']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from `pembelian` where NoPembelian LIKE '%$key%' OR TotalBiaya LIKE '%$key%' OR IDSupplier LIKE '%$key%' OR NIK LIKE '%$key%';";
		
		echo "Hasil pencarian data pembelian dengan kata '$key'";
	}
	
	else if(isset($_POST['pencarian']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select * from `pembelian`";
	}
	
	$no = 1;
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$NoPembelian = $isi['NoPembelian'];
		$TglPembelian = $isi['TglPembelian'];
		$TotalBiaya = $isi['TotalBiaya'];
		$IDSupplier = $isi['IDSupplier'];
		$NIK = $isi['NIK'];
		
		?>
		<tr align='center'>
        	<td><?php echo $no ?></td>  
			<td><?php echo $NoPembelian ?></td> 
			<td><?php echo $TglPembelian ?></td> 
			<td>Rp.<?php echo $TotalBiaya ?>,-</td> 
			<td><?php echo $IDSupplier ?></td>
            <td><?php echo $NIK ?></td>
            <?php 
			if($_SESSION['TypeUser']!=="user")
			{ ?>
            <td>
            
            <form action="halaman_utama.php?aksi_pembelian=$aksi_pembelian" method="post">
            
    	   	<input type="hidden" name="NoPembelian" value="<?php echo $NoPembelian; ?>">
          	<input class="update" name="proses" type="submit" value="Update">
           	<input class="delete" name="proses" type="submit" value="Delete" onClick ="return confirm('Apakah Anda ingin menghapus data pembelian <?php echo $NoPembelian; ?> ?')"></a>
           
          	</form>
            
            </td>
            <?php } ?>
		</tr>
		<?php
		;
		$no++;
	}
	?>
</table>