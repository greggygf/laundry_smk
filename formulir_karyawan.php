<h2>Form Pendaftaran Karyawan</h2><hr color="#0263A0"><br>

 <form action="input_karyawan.php" method="POST">
        
     <table>
    <tr>
        <td>NIK</td>
    </tr>
    <tr>
        <td><input type="text" name='NIK' size="25px" maxlength="20" placeholder="ketikkan NIK.."></td>
    </tr>
    
    <tr>
        <td>Nama Karyawan</td>
    </tr>
    <tr>
        <td><input type="text" name="NmKaryawan" size="25px" maxlength="50" placeholder="ketikkan nama karyawan.."></td>
    </tr>
    
    <tr>
        <td>Alamat Karyawan</td>
    </tr>
    <tr>
        <td><textarea name="AlmtKaryawan" cols="27" rows="5" maxlength="50" placeholder="ketikkan alamat rumah karyawan.." ></textarea></td>
    </tr>
    
        <tr>
        <td>No.Handphone</td>
    </tr>
    <tr>
        <td><input type="text" name="TelpKaryawan" size="25px" maxlength="13" placeholder="ketikkan no.handphone karyawan.."></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
    </tr>
    <tr>
        <td>
        <input type="radio" name="GenderKaryawan" value="P" >&nbsp;Perempuan&nbsp;&nbsp;
        <input type="radio" name="GenderKaryawan" value="L">&nbsp;Laki-Laki
        </td>
    </tr>
    
    <tr>
    	<td><br><input class="tombol" type="submit" value="Tambah"></td>
   	</tr>
    
    
</table>

</form>

        
