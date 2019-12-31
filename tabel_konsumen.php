<h2>Daftar Member</h2>
<hr color="#0263A0"><br>

<form action="halaman_utama.php?tabel_konsumen=$tabel_konsumen" method="post">
	<input type="search" name="cari" placeholder="Pencarian Member" class="css-input" style="width:250px;" />
	<button type="submit" name="pencarian" value="Cari" class="btn" style="padding:3px;" margin="6px;" width="10px;"><img src="animasi/search.png" height="10" width="12"></button>
</form>

<br>

<table id="daftar-table" border='1' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="short">NO</th>
		<th class="normal">KODE MEMBER</th>
		<th class="normal">NAMA MEMBER</th>
		<th class="normal">ALAMAT MEMBER</th>
		<th class="normal">NO.HANDPHONE</th>
		<?php
		if ($_SESSION['TypeUser'] !== "user") { ?>
			<th class="normal">TOOLS</th>
		<?php } ?>
	</tr>
	<?php
	include "koneksi.php";

	$tampilkan_isi = "select * from `konsumen`";

	if (isset($_POST['pencarian']) and $_POST['cari'] <> "") {
		$key = $_POST['cari'];
		$tampilkan_isi = "SELECT * from `konsumen` where KodeKonsumen LIKE '%$key%' OR NmKonsumen LIKE '%$key%' OR AlmtKonsumen LIKE '%$key%' OR TelpKonsumen LIKE '%$key%';";

		echo "Hasil pencarian data konsumen dengan kata '$key'";
	} else if (isset($_POST['pencarian']) and $_POST['cari'] == "") {
		$tampilkan_isi = "select * from `konsumen`";
	}

	$no = 1;
	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$KodeKonsumen = $isi['KodeKonsumen'];
		$NmKonsumen = $isi['NmKonsumen'];
		$AlmtKonsumen = $isi['AlmtKonsumen'];
		$TelpKonsumen = $isi['TelpKonsumen'];

	?>
		<tr align='center'>
			<td><?php echo $no ?></td>
			<td><?php echo $KodeKonsumen ?></td>
			<td><?php echo $NmKonsumen ?></td>
			<td><?php echo $AlmtKonsumen ?></td>
			<td><?php echo $TelpKonsumen ?></td>
			<?php
			if ($_SESSION['TypeUser'] !== "user") { ?>
				<td>

					<form action="halaman_utama.php?aksi_konsumen=$aksi_konsumen" method="post">
						<input type="hidden" name="KodeKonsumen" value="<?php echo $KodeKonsumen; ?>">
						<input class="update" name="proses" type="submit" value="Update">
						<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data konsumen <?php echo $NmKonsumen; ?> ?')"></a>
					</form>

				</td>
			<?php } ?>
		</tr>
	<?php
		$no++;
	}
	?>
</table>