<body>
<?php

include "koneksi.php";
$NIK = $_POST['NIK'];
$aksi = strtolower($_POST['proses']);

if($aksi == "delete")
{
	
	$deleteKaryawan = "DELETE from karyawan where NIK='$NIK'";

	$deleteKaryawan_query = mysqli_query($connect,$deleteKaryawan);

	if ($deleteKaryawan_query)
	{
		echo "<br><hr color=`#0263A0`><br>	Delete berhasil dijalankan! Untuk melihat kembali data Karyawan,silakan klik"; ?><a href="halaman_utama.php?tabel_karyawan=$tabel_karyawan">  <input type="button" class="tombol" value="Back"></a>
		
	<?php
	}
	else
	{
		
	}
}
else {

	$query=mysqli_query($connect,"select * from karyawan where NIK='$NIK'");
?>

 
 <form action="update_karyawan.php" method="POST">
        
     <h2>Update Data Karyawan</h2><hr color="#0263A0"><br>
     <table>
     
    <?php
	while($isi=mysqli_fetch_array($query)){
	?>
     
    <tr>
        <td>NIK</td>
    </tr>
    <tr>
        <td><input type="text" name='NIK' size="25px" maxlength="20" value="<?php echo $NIK;?>" style="color:#888;" readonly></td>
    </tr>
    
    <tr>
        <td>Nama Karyawan</td>
    </tr>
    <tr>
        <td><input type="text" name="NmKaryawan" size="25px" maxlength="50" value="<?php echo $isi['NmKaryawan'];?>"></td>
    </tr>
    
    <tr>
        <td>Alamat Karyawan</td>
    </tr>
    <tr>
        <td><textarea name="AlmtKaryawan" cols="27" rows="5" maxlength="50" ><?php echo $isi['AlmtKaryawan'];?></textarea></td>
    </tr>
    
        <tr>
        <td>No.Handphone</td>
    </tr>
    <tr>
        <td><input type="text" name="TelpKaryawan" size="25px" maxlength="20" value="<?php echo $isi['TelpKaryawan'];?>"></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
    </tr>
    <tr>
        <td>
        <?php if ($isi['GenderKaryawan'] == "P") { ?>
        <input type="radio" name="GenderKaryawan" value="P" checked>&nbsp;Perempuan&nbsp;&nbsp;
        <input type="radio" name="GenderKaryawan" value="L">&nbsp;Laki-Laki
        <?php ;} else { ?>
        <input type="radio" name="GenderKaryawan" value="P">&nbsp;Perempuan&nbsp;&nbsp;
        <input type="radio" name="GenderKaryawan" value="L" checked>&nbsp;Laki-Laki
        <?php ;} ?>
        </td>
    </tr>
    
    <tr>
    	<td><br><input class="tombol" type="submit" value="Update"></td>
   	</tr>
    
    <?php } ?>
    </table>
    </form>
    <?php
	}

?>