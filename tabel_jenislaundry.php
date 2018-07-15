<h2>Daftar Jenis Laundry</h2><hr color="#0263A0"><br>

<form action="halaman_utama.php?tabel_jenislaundry=$tabel_jenislaundry" method="post">
   <input type="search" name="cari" placeholder="Pencarian Jenis Laundry" class="css-input" style="width:250px;" />
   <button type="submit" name="pencarian" value="Cari" class="btn" style="padding:3px;" margin="6px;" width="10px;"><img src="animasi/search.png" height="10" width="15"></button>
</form>
<br>

<table id="daftar-table" border='1' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
    	<th class="short">NO</th>
		<th class="normal">ID JENIS LAUNDRY</th>
		<th class="normal">JENIS LAUNDRY</th>
        <?php 
		if($_SESSION['TypeUser']!=="user")
		{ ?>
        <th class="normal">TOOLS</th>
        <?php } ?>
	</tr>
	<?php
	include "koneksi.php";
		
	$tampilkan_isi = "select * from `jenis_laundry`";
	
	if(isset($_POST['pencarian']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "SELECT * from `jenis_laundry` where IDJenisLaundry LIKE '%$key%' OR NmJenisLaundry LIKE '%$key%';";
		
		echo "Pencarian data jenis laundry dengan kata '$key'";
	}
	
	else if(isset($_POST['pencarian']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select * from `jenis_laundry`";
	}
	
	$no = 1;
	
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$IDJenisLaundry = $isi['IDJenisLaundry'];
		$NmJenisLaundry = $isi['NmJenisLaundry'];
		
		?>
		<tr align='center'> 
        	<td><?php echo $no ?></td> 
			<td><?php echo $IDJenisLaundry ?></td> 
			<td><?php echo $NmJenisLaundry ?></td>  
            <?php 
			if($_SESSION['TypeUser']!=="user")
			{ ?>
            <td>
            <form action="halaman_utama.php?aksi_jenislaundry=$aksi_jenislaundry" method="post">
            <input type="hidden" name="IDJenisLaundry" value="<?php echo $IDJenisLaundry; ?>">
            <input class="update" name="proses" type="submit" value="Update">
            <input class="delete" name="proses" type="submit" value="Delete" onClick ="return confirm('Apakah Anda ingin menghapus jenis laundry <?php echo $NmJenisLaundry; ?> ?')"></td>
            <?php } ?>
		</tr>
        </form>
		<?php
		;
		$no++;
	}
	?>
</table>