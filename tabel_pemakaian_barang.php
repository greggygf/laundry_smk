<h2>Daftar Pemakaian Barang</h2>
<hr color="#0263A0"><br>

<form action="halaman_utama.php?tabel_pemakaian_barang=$tabel_pemakaian_barang" method="post">
	<input type="search" name="cari" placeholder="Pencarian Data Pemakaian Barang" class="css-input" style="width:250px;" />
	<button type="submit" name="pencarian" value="Cari" class="btn" style="padding:3px;" margin="6px;" width="10px;"><img src="animasi/search.png" height="10" width="12"></button>
</form>
<br>

<table id="daftar-table" border='1' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="short">NO</th>
		<th class="normal">KODE PENGELUARAN</th>
		<th class="normal">JUMLAH</th>
		<th class="normal">KODE BARANG</th>
		<th class="normal">NIK</th>
		<?php
		if ($_SESSION['TypeUser'] !== "user") { ?>
			<th class="normal">TOOLS</th>
		<?php } ?>
	</tr>
	<?php
	include "koneksi.php";
	$tampilkan_isi = "select * from `pemakaian_barang`";

	if (isset($_POST['pencarian']) and $_POST['cari'] <> "") {
		$key = $_POST['cari'];
		$tampilkan_isi = "SELECT * from `pemakaian_barang` where KodePengeluaran LIKE '%$key%' OR Jumlah LIKE '%$key%' OR KodeBarang LIKE '%$key%' OR NIK LIKE '%$key%';";

		echo "Hasil pencarian data pemakaian barang dengan kata '$key'";
	} else if (isset($_POST['pencarian']) and $_POST['cari'] == "") {
		$tampilkan_isi = "select * from `pemakaian_barang`";
	}

	$no = 1;
	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$KodePengeluaran = $isi['KodePengeluaran'];
		$Jumlah = $isi['Jumlah'];
		$KodeBarang = $isi['KodeBarang'];
		$NIK = $isi['NIK'];

	?>
		<tr align='center'>
			<td><?php echo $no ?></td>
			<td><?php echo $KodePengeluaran ?></td>
			<td><?php echo $Jumlah ?></td>
			<td><?php echo $KodeBarang ?></td>
			<td><?php echo $NIK ?></td>
			<?php
			if ($_SESSION['TypeUser'] !== "user") { ?>
				<td>

					<form action="halaman_utama.php?aksi_pemakaian_barang=$aksi_pemakaian_barang" method="post">
						<input type="hidden" name="KodePengeluaran" value="<?php echo $KodePengeluaran; ?>">
						<input class="update" name="proses" type="submit" value="Update">
						<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data pemakaian barang no <?php echo $KodePengeluaran; ?> ?')">


				</td>
			<?php } ?>
		</tr>
		</form>
	<?php
		$no++;
	}
	?>
</table>