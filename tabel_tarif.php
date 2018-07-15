<h2>Daftar Tarif</h2><hr color="#0263A0"><br>

<form action="halaman_utama.php?tabel_tarif=$tabel_tarif" method="post">
   <input type="search" name="cari" placeholder="Pencarian Tarif" class="css-input" style="width:250px;" />
   <button type="submit" name="pencarian" value="Cari" class="btn" style="padding:3px;" margin="6px;" width="10px;"><img src="animasi/search.png" height="10" width="12"></button>
</form>

<br>

<table id="daftar-table" border='1' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
    	<th class="short">NO</th>
		<th class="normal">ID JENIS PAKAIAN</th>
		<th class="normal">NAMA PAKAIAN</th>
		<th class="normal">JENIS LAUNDRY</th>
		<th class="normal">TARIF</th>
        <?php 
		if($_SESSION['TypeUser']!=="user")
		{ ?>
        <th class="normal">TOOLS</th>
        <?php } ?>
	</tr>
	<?php
	include "koneksi.php";
	$tampilkan_isi = "select t.IDJenisPakaian,t.NmPakaian,jl.NmJenisLaundry,t.tarif from tarif t
					  inner join jenis_laundry jl
					  on t.IDJenisLaundry = jl.IDJenisLaundry;";
					  
	if(isset($_POST['pencarian']) and $_POST['cari'] <> "")
	{
		$key = $_POST['cari'];
		$tampilkan_isi = "select t.IDJenisPakaian,t.NmPakaian,jl.NmJenisLaundry,t.tarif from tarif t
					  	  inner join jenis_laundry jl
					      on t.IDJenisLaundry = jl.IDJenisLaundry AND t.NmPakaian LIKE '%$key%'";
						  
		echo "Pencarian data tarif dengan kata '$key'";
	}	
	
	else if(isset($_POST['pencarian']) and $_POST['cari'] == "")
	{
		$tampilkan_isi = "select t.IDJenisPakaian,t.NmPakaian,jl.NmJenisLaundry,t.tarif from tarif t
					  	  inner join jenis_laundry jl
					      on t.IDJenisLaundry = jl.IDJenisLaundry;";
	}		
					 
	$no = 1;
					  
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$IDJenisPakaian = $isi['IDJenisPakaian'];
		$NmPakaian = $isi['NmPakaian'];
		$NmJenisLaundry = $isi['NmJenisLaundry'];
		$tarif = $isi['tarif'];
		
		?>
		<tr align='center'>
        	<td><?php echo $no ?></td> 
			<td><?php echo $IDJenisPakaian ?></td> 
			<td><?php echo $NmPakaian ?></td> 
			<td><?php echo $NmJenisLaundry ?></td> 
			<td>Rp.<?php echo $tarif ?>,-</td> 
            <?php 
			if($_SESSION['TypeUser']!=="user")
			{ ?>
            <td>
            
            <form action="halaman_utama.php?aksi_tarif=$aksi_tarif" method="post">
            
    	   	<input type="hidden" name="IDJenisPakaian" value="<?php echo $IDJenisPakaian; ?>">
          	<input class="update" name="proses" type="submit" value="Update">
           	<input class="delete" name="proses" type="submit" value="Delete" onClick ="return confirm('Apakah Anda ingin menghapus data tarif <?php echo $NmJenisLaundry;?> <?php echo $NmPakaian; ?> ?')"></a>
           
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