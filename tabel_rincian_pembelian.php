<h2>Daftar Rincian Pembelian</h2>
<hr color="#0263A0"><br>

<form action="halaman_utama.php?tabel_rincian_pembelian=$tabel_rincian_pembelian" method="post">
	<input type="search" name="cari" placeholder="Pencarian Data Rincian Pembelian" class="css-input" style="width:250px;" />
	<button type="submit" name="pencarian" value="Cari" class="btn" style="padding:3px;" margin="6px;" width="10px;"><img src="animasi/search.png" height="10" width="12"></button>
</form>
<br>

<table id="daftar-table" border='1' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="short">NO</th>
		<th class="normal">NO RINCIAN</th>
		<th class="normal">JUMLAH</th>
		<th class="normal">NO PEMBELIAN</th>
		<th class="normal">KODE BARANG</th>
		<?php
		if ($_SESSION['TypeUser'] !== "user") { ?>
			<th class="normal">TOOLS</th>
		<?php } ?>
	</tr>
	<?php
	include "koneksi.php";
	$tampilkan_isi = "select * from `rincian_pembelian`";

	if (isset($_POST['pencarian']) and $_POST['cari'] <> "") {
		$key = $_POST['cari'];
		$tampilkan_isi = "select * from `rincian_pembelian` where NoRincian LIKE '%$key%' OR Jumlah LIKE '%$key%' OR NoPembelian LIKE '%$key%' OR KodeBarang LIKE '%$key%'";

		echo "Hasil pencarian data rincian pembelian dengan kata '$key'";
	} else if (isset($_POST['pencarian']) and $_POST['cari'] == "") {
		$tampilkan_isi = "select * from `rincian_pembelian`";
	}

	$no = 1;
	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$NoRincian = $isi['NoRincian'];
		$Jumlah = $isi['Jumlah'];
		$NoPembelian = $isi['NoPembelian'];
		$KodeBarang = $isi['KodeBarang'];

	?>
		<tr align='center'>
			<td><?php echo $no ?></td>
			<td><?php echo $NoRincian ?></td>
			<td><?php echo $Jumlah ?></td>
			<td><?php echo $NoPembelian ?></td>
			<td><?php echo $KodeBarang ?></td>
			<?php
			if ($_SESSION['TypeUser'] !== "user") { ?>
				<td>

					<form action="halaman_utama.php?aksi_rincian_pembelian=$aksi_rincian_pembelian" method="post">
						<input type="hidden" name="NoRincian" value="<?php echo $NoRincian; ?>">
						<input class="update" name="proses" type="submit" value="Update">
						<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data rincian pembelian no <?php echo $NoRincian; ?> ?')">


				</td>
			<?php } ?>
		</tr>
		</form>
	<?php
		$no++;
	}
	?>
</table>