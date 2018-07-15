<h2>Form Pendaftaran Member</h2><hr color="#0263A0"><br>

 <form action="input_konsumen.php" method="POST">
        
     <table>
    <tr>
        <td>Kode Member</td>
    </tr>
    <tr>
        <td><input type="text" name='KodeKonsumen' size="25px" maxlength="5" placeholder="ketikkan kode member.."></td>
    </tr>
    
    <tr>
        <td>Nama Member</td>
    </tr>
    <tr>
        <td><input type="text" name="NmKonsumen" size="25px" maxlength="50" placeholder="ketikkan nama member.."></td>
    </tr>
    
    <tr>
        <td>Alamat Member</td>
    </tr>
    <tr>
        <td><textarea name="AlmtKonsumen" cols="27" rows="5" maxlength="50" placeholder="ketikkan alamat rumah member.." ></textarea></td>
    </tr>
    
        <tr>
        <td>No.Handphone</td>
    </tr>
    <tr>
        <td><input type="text" name="TelpKonsumen" size="25px" maxlength="13" placeholder="ketikkan no.handphone member.."></td>
    </tr>
    <tr>
    	<td><br><input class="tombol" type="submit" value="Tambah" size="25px" ></td>
   	</tr>
    
    
</table>

</form>