<h2>Daftar Karyawan</h2>
<hr color="#0263A0"><br>

<form action="halaman_utama.php?tabel_karyawan=$tabel_karyawan" method="post">
	<input type="search" name="cari" placeholder="Pencarian Karyawan" class="css-input" style="width:250px;" />
	<button type="submit" name="pencarian" value="Cari" class="cari" style="padding:3px;" margin="6px;" width="10px;"><img src="../img/icon/search.png" height="10" width="12"></button>
</form>
<br>

<table id="daftar-table" border='1' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="short">NO</th>
		<th class="normal">NIK</th>
		<th class="normal">NAMA KARYAWAN</th>
		<th class="normal">ALAMAT KARYAWAN</th>
		<th class="normal">NO.HANDPHONE</th>
		<th class="normal">JENIS KELAMIN</th>
		<?php
		if ($_SESSION['TypeUser'] !== "user") { ?>
			<th class="normal">TOOLS</th>
		<?php } ?>
	</tr>
	<?php
	include "../config/koneksi.php";
	$tampilkan_isi = "select * from `karyawan`";

	if (isset($_POST['pencarian']) and $_POST['cari'] <> "") {
		$key = $_POST['cari'];
		$tampilkan_isi = "SELECT * from `karyawan` where NIK LIKE '%$key%' OR NmKaryawan LIKE '%$key%' OR AlmtKaryawan LIKE '%$key%' OR TelpKaryawan LIKE '%$key%' OR GenderKaryawan LIKE '%$key%';";

		echo "Hasil pencarian data karyawan dengan kata '$key'";
	} else if (isset($_POST['pencarian']) and $_POST['cari'] == "") {
		$tampilkan_isi = "select * from `karyawan`";
	}

	$no = 1;
	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$NIK = $isi['NIK'];
		$NmKaryawan = $isi['NmKaryawan'];
		$AlmtKaryawan = $isi['AlmtKaryawan'];
		$TelpKaryawan = $isi['TelpKaryawan'];
		$GenderKaryawan = $isi['GenderKaryawan'];

	?>
		<tr align='center'>
			<td><?php echo $no ?></td>
			<td><?php echo $NIK ?></td>
			<td><?php echo $NmKaryawan ?></td>
			<td><?php echo $AlmtKaryawan ?></td>
			<td><?php echo $TelpKaryawan ?></td>
			<td><?php echo $GenderKaryawan ?></td>
			<?php
			if ($_SESSION['TypeUser'] !== "user") { ?>
				<td>
					<form action="halaman_utama.php?aksi_karyawan=$aksi_karyawan" method="post">
						<input type="hidden" name="NIK" value="<?php echo $NIK; ?>">
						<input class="update" name="proses" type="submit" value="Update">
						<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data karyawan <?php echo $NmKaryawan; ?> ?')"></a>
					</form>

				</td>
			<?php } ?>
		</tr>
	<?php
		$no++;
	}
	?>
</table>