<h2>Form Pendaftaran Login</h2><hr color="#0263A0"><br>

 <form action="input_login.php" method="POST">

<table>
	<tr>
        <td>Nama Karyawan (YANG TERDAFTAR)</td>
    </tr>
 
    <tr>
        <td><select name="NIK">
        <option value="" disabled selected>--</option>
                <?php include "koneksi.php";
	$tampilkan_isi = "select NIK,NmKaryawan from `karyawan` order by NmKaryawan";
	$tampilkan_isi_sql = mysqli_query($connect,$tampilkan_isi);
	
	while ($isi = mysqli_fetch_array($tampilkan_isi_sql))
	{
		$NIK = $isi['NIK'];
		$NmKaryawan = $isi['NmKaryawan'];
	?>
	<option value="<?php echo $NIK ?>"><?php echo $NmKaryawan ?>
    <?php
		;
	}
	?>
    </option>
        </td>
    </tr>
     
    <tr>
        <td>Username</td>
    </tr>
    <tr>
        <td><input type="text" name='username' size="25px" maxlength="10" placeholder="ketikkan username.."></td>
    </tr>
    
    <tr>
        <td>Password</td>
    </tr>
    <tr>
        <td><input type="password" name="password" size="25px" maxlength="10" placeholder="ketikkan password.."></td>
    </tr>
    
    <tr>
        <td>Type User</td>
    </tr>
    <tr>
        <td>
        <select name="TypeUser" >
        	<option value="" disabled selected>--</option>
        	<option value="admin">Admin</option>
   			<option value="operator">Operator</option>
   			<option value="user">User</option>
		</select>
        </td>
    </tr> 
    
    <tr>
    	<td><br><input class="tombol" type="submit" value="Tambah"></td>
   	</tr>
    
</table>

</form>

        
