<h2>Form Pendaftaran Barang</h2>
<hr color="#0263A0"><br>

<form action="../process/input/input_barang.php" method="POST">

    <table>
        <tr>
            <td>Kode Barang</td>
        </tr>
        <tr>
            <td><input type="text" name='KodeBarang' size="25px" maxlength="5" placeholder="ketikkan kode barang.."></td>
        </tr>

        <tr>
            <td>Nama Barang</td>
        </tr>
        <tr>
            <td><input type="text" name="NmBarang" size="25px" maxlength="50" placeholder="ketikkan nama barang.."></td>
        </tr>

        <tr>
            <td>Stok</td>
        </tr>
        <tr>
            <td><input type="text" name="Stok" size="25px" placeholder="ketikkan jumlah stok.."></td>
        </tr>

        <tr>
            <td>Tanggal Update Stok</td>
        </tr>
        <tr>
            <td><input type="date" name="TglUpdateStok" size="25px"></td>
        </tr>

        <tr>
            <td><br><input class="tombol" type="submit" value="Tambah"></td>
        </tr>

    </table>

</form>