<h2>Daftar Barang</h2>
<hr color="#0263A0"><br>

<form action="halaman_utama.php?tabel_barang=$tabel_barang" method="post">
	<input type="search" name="cari" placeholder="Pencarian Barang" class="css-input" style="width:250px;" />
	<button type="submit" name="pencarian" value="Cari" class="btn" style="padding:3px;" margin="6px;" width="10px;"><img src="../img/icon/search.png" height="10" width="12"></button>
</form>
<font size="1">Catatan : Jika mencari data dalam <u>Tanggal</u>,maka formatnya adalah <b>YYYY-MM-DD</b></font>
<br>
<br>

<table id="daftar-table" border='1' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="short">NO</th>
		<th class="normal">KODE BARANG</th>
		<th class="normal">NAMA BARANG</th>
		<th class="normal">STOK</th>
		<th class="normal">TGL UPDATE STOK</th>
		<?php
		if ($_SESSION['TypeUser'] !== "user") { ?>
			<th class="normal">TOOLS</th>
		<?php } ?>
	</tr>
	<?php
	include "../config/koneksi.php";
	$tampilkan_isi = "select * from `barang`";

	if (isset($_POST['pencarian']) and $_POST['cari'] <> "") {
		$key = $_POST['cari'];
		$tampilkan_isi = "SELECT * from `barang` where KodeBarang LIKE '%$key%' OR NmBarang LIKE '%$key%' OR Stok LIKE '%$key%' OR TglUpdateStok LIKE '%$key%';";

		echo "Hasil pencarian data barang dengan kata '$key'";
	} else if (isset($_POST['pencarian']) and $_POST['cari'] == "") {
		$tampilkan_isi = "select * from `barang`";
	}

	$no = 1;
	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$KodeBarang = $isi['KodeBarang'];
		$NmBarang = $isi['NmBarang'];
		$Stok = $isi['Stok'];
		$TglUpdateStok = $isi['TglUpdateStok'];

	?>
		<tr align='center'>
			<td><?php echo $no ?></td>
			<td><?php echo $KodeBarang ?></td>
			<td><?php echo $NmBarang ?></td>
			<td><?php echo $Stok ?></td>
			<td><?php echo $TglUpdateStok ?></td>
			<?php
			if ($_SESSION['TypeUser'] !== "user") { ?>
				<td>
					<form action="halaman_utama.php?aksi_barang=$aksi_barang" method="post">
						<input type="hidden" name="KodeBarang" value="<?php echo $KodeBarang; ?>">
						<input class="update" name="proses" type="submit" value="Update">
						<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus barang <?php echo $NmBarang; ?> ?')">
				</td>
			<?php } ?>
		</tr>
		</form>
	<?php
		$no++;
	}
	?>
</table>