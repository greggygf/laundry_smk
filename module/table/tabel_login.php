<h2>Daftar Data Login</h2>
<hr color="#0263A0"><br>

<form action="halaman_utama.php?tabel_login=$tabel_login" method="post">
	<input type="search" name="cari" placeholder="Pencarian Data Login" class="css-input" style="width:250px;" />
	<button type="submit" name="pencarian" value="Cari" class="btn" style="padding:3px;" margin="6px;" width="10px;"><img src="../img/icon/search.png" height="10" width="12"></button>
</form>
<br>

<table id="daftar-table" border='1' bordercolor="black" cellpading='2' cellspacing='2' width='100%'>
	<tr align='center'>
		<th class="short">NO</th>
		<th class="normal">NAMA KARYAWAN</th>
		<th class="normal">USERNAME</th>
		<th class="normal">PASSWORD</th>
		<th class="normal">TYPE USER</th>
		<?php
		if ($_SESSION['TypeUser'] !== "user") { ?>
			<th class="normal">TOOLS</th>
		<?php } ?>
	</tr>
	<?php
	include "../config/koneksi.php";
	$tampilkan_isi = "select k.NIK,k.NmKaryawan,l.username,l.password,l.TypeUser from `login` l,`karyawan` k where l.NIK = k.NIK";

	if (isset($_POST['pencarian']) and $_POST['cari'] <> "") {
		$key = $_POST['cari'];
		$tampilkan_isi = "select k.NIK,k.NmKaryawan,l.username,l.password,l.TypeUser from `login` l,`karyawan` k where l.NIK = k.NIK AND NmKaryawan LIKE '%$key%'";

		echo "Hasil pencarian data login dengan kata '$key'";
	} else if (isset($_POST['pencarian']) and $_POST['cari'] == "") {
		$tampilkan_isi = "select k.NIK,k.NmKaryawan,l.username,l.password,l.TypeUser from `login` l,`karyawan` k where l.NIK = k.NIK";
	}

	$no = 1;
	$tampilkan_isi_sql = mysqli_query($connect, $tampilkan_isi);

	while ($isi = mysqli_fetch_array($tampilkan_isi_sql)) {
		$NIK = $isi['NIK'];
		$NmKaryawan = $isi['NmKaryawan'];
		$username = $isi['username'];
		$password = $isi['password'];
		$TypeUser = $isi['TypeUser'];

	?>
		<tr align='center'>
			<td><?php echo $no ?></td>
			<td><?php echo $NmKaryawan ?></td>
			<td><?php echo $username ?></td>
			<td><?php echo $password ?></td>
			<td><?php echo $TypeUser ?></td>
			<?php
			if ($_SESSION['TypeUser'] !== "user") { ?>
				<td>

					<form action="halaman_utama.php?aksi_login=$aksi_login" method="post">

						<input type="hidden" name="NIK" value="<?php echo $NIK; ?>">
						<input class="update" name="proses" type="submit" value="Update">
						<input class="delete" name="proses" type="submit" value="Delete" onClick="return confirm('Apakah Anda ingin menghapus data login <?php echo $username; ?> ?')"></a>

					</form>

				</td>
			<?php } ?>
		</tr>
	<?php
		$no++;
	}
	?>
</table>