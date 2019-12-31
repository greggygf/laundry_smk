<h2>Daftar Transaksi</h2>
<hr color="#0263A0"><br>

<form action="halaman_utama.php?tabel_transaksi=$tabel_transaksi" method="post">
	<input type="search" name="cari" placeholder="Pencarian Data Transaksi" class="css-input" style="width:250px;" />
	<button type="submit" name="pencarian" value="Cari" class="btn" style="padding:3px;" margin="6px;" width="10px;"><img src="animasi/search.png" height="10" width="12"></button>
</form>
<font size="1">Catatan : Jika mencari data dalam <u>Tanggal</u>,maka formatnya adalah <b>YYYY-MM-DD</b></font>
<br>
<br>

<table id="daftar-table" border='1' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="short">NO</th>
		<th class="short">NO TRANSAKSI</th>
		<th class="normal">TANGGAL TRANSAKSI</th>
		<th class="normal">TANGGAL AMBIL</th>
		<th class="normal">DISKON</th>
		<th class="normal"> KODE KONSUMEN </th>
		<th class="normal">NIK</th>
		<?php
		if ($_SESSION['TypeUser'] !== "user") { ?>
			<th class="normal">AKSI</th>
		<?php } ?>
	</tr>
	<?php
	include "koneksi.php";
	$tampilkan_isi = "select * from `transaksi`";

	if (isset($_POST['pencarian']) and $_POST['cari'] <> "") {
		$key = $_POST['cari'];
		$tampilkan_isi = "SELECT * from `transaksi` where NoTransaksi LIKE '%$key%' OR TglTransaksi LIKE '%$key%' OR TglAmbil LIKE '%$key%' OR Diskon LIKE '%$key%' OR KodeKonsumen LIKE '%$key%' OR NIK LIKE '%$key%';";

		echo "Hasil pencarian data transaksi dengan kata '$key'";
	} else if (isset($_POST['pencarian']) and $_POST['cari'] == "") {
		$tampilkan_isi = "select * from `transaksi`";
	}

	$no = 1;
	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$NoTransaksi = $isi['NoTransaksi'];
		$TglTransaksi = $isi['TglTransaksi'];
		$TglAmbil = $isi['TglAmbil'];
		$Diskon = $isi['Diskon'];
		$KodeKonsumen = $isi['KodeKonsumen'];
		$NIK = $isi['NIK'];

	?>
		<tr align='center'>
			<td><?php echo $no ?></td>
			<td><?php echo $NoTransaksi ?></td>
			<td><?php echo $TglTransaksi ?></td>
			<td><?php echo $TglAmbil ?></td>
			<td>Rp.<?php echo $Diskon ?>,-</td>
			<td><?php echo $KodeKonsumen ?></td>
			<td><?php echo $NIK  ?></td>
			<?php
			if ($_SESSION['TypeUser'] !== "user") { ?>
				<td>

					<form action="halaman_utama.php?aksi_transaksi=$aksi_transaksi" method="post">
						<input type="hidden" name="NoTransaksi" value="<?php echo $NoTransaksi; ?>">
						<input class="update" name="proses" type="submit" value="Update">
						<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus transaksi dengan nomor <?php echo $NoTransaksi; ?> ?')">


				</td>
			<?php } ?>
		</tr>
		</form>
	<?php
		$no++;
	}
	?>
</table>