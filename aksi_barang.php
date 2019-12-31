<body>
    <?php
    include "koneksi.php";
    $KodeBarang = $_POST['KodeBarang'];
    $aksi = strtolower($_POST['proses']);

    if ($aksi == "delete") {

        $deleteBarang = "DELETE from barang where KodeBarang='$KodeBarang'";

        $deleteBarang_query = mysqli_query($connect, $deleteBarang);

        if ($deleteBarang_query) {
            echo "<br><hr><br>	Delete berhasil dijalankan! Untuk melihat kembali data Barang,silakan klik"; ?><a href="halaman_utama.php?tabel_barang=$tabel_barang"> <input type="button" class="tombol" value="Back"></a>

        <?php
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        $query = mysqli_query($connect, "select * from barang where KodeBarang='$KodeBarang'");
        ?>

        <h2>Update Data Barang</h2>
        <hr color="#0263A0"><br>

        <form action="update_barang.php" method="POST">

            <table>

                <?php
                while ($isi = mysqli_fetch_array($query)) {
                ?>


                    <tr>
                        <td>Kode Barang</td>
                    </tr>
                    <tr>
                        <td><input type="text" name='KodeBarang' size="25px" style="color:#888;" value="<?php echo $KodeBarang; ?>" readonly></td>
                    </tr>

                    <tr>
                        <td>Nama Barang</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="NmBarang" size="25px" value="<?php echo $isi['NmBarang']; ?>"></td>
                    </tr>

                    <tr>
                        <td>Stok</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="Stok" size="25px" value="<?php echo $isi['Stok']; ?>"></td>
                    </tr>

                    <tr>
                        <td>Tanggal Update Stok</td>
                    </tr>
                    <tr>
                        <td><input type="date" name="TglUpdateStok" size="25px" value="<?php echo $isi['TglUpdateStok']; ?>"></td>
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