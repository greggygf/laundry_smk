<body>
    <?php

    include "../config/koneksi.php";
    $NoTransaksi = $_POST['NoTransaksi'];
    $aksi = strtolower($_POST['proses']);

    if ($aksi == "delete") {

        $deleteTransaksi = "DELETE from transaksi where NoTransaksi='$NoTransaksi'";

        $deleteTransaksi_query = mysqli_query($connect, $deleteTransaksi);

        if ($deleteTransaksi_query) {
            echo "<br><hr color=`#0263A0`><br>	Delete berhasil dijalankan! Untuk melihat kembali data transaksi,silakan klik"; ?><a href="halaman_utama.php?tabel_transaksi=$tabel_transaksi"> <input type="button" class="tombol" value="Back"></a>

        <?php
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        $query = mysqli_query($connect, "select * from transaksi where NoTransaksi='$NoTransaksi'");
        $query2 = mysqli_query($connect, "select NmKaryawan from karyawan k,transaksi t where t.NIK = k.NIK AND NoTransaksi='$NoTransaksi'");
        $query3 = mysqli_query($connect, "select NmKonsumen from konsumen k,transaksi t where k.KodeKonsumen = t.KodeKonsumen AND NoTransaksi='$NoTransaksi'");
        ?>


        <form action="../process/update/update_transaksi.php" method="POST">

            <h2>Update Data Transaksi</h2>
            <hr color="#0263A0"><br>
            <table>

                <?php
                while ($isi = mysqli_fetch_array($query)) {
                ?>

                    <?php
                    while ($isi2 = mysqli_fetch_array($query2)) {
                    ?>

                        <tr>
                            <td>Nama Karyawan</td>
                        </tr>

                        <tr>
                            <td><input type="text" name='NmKaryawan' size="25px" maxlength="20" value="<?php echo $isi2['NmKaryawan']; ?>" style="color:#888;" readonly></td>
                        </tr>

                    <?php } ?>

                    <?php
                    while ($isi3 = mysqli_fetch_array($query3)) {
                    ?>

                        <tr>
                            <td>Nama Konsumen</td>
                        </tr>

                        <tr>
                            <td><input type="text" name='NmKaryawan' size="25px" maxlength="20" value="<?php echo $isi3['NmKonsumen']; ?>" style="color:#888;" readonly></td>
                        </tr>

                    <?php } ?>

                    <tr>
                        <td>No.Transaksi</td>
                    </tr>
                    <tr>
                        <td><input type="text" name='NoTransaksi' size="25px" maxlength="20" value="<?php echo $NoTransaksi; ?>" style="color:#888;" readonly></td>
                    </tr>

                    <tr>
                        <td>Tanggal Transaksi</td>
                    </tr>
                    <tr>
                        <td><input type="date" name="TglTransaksi" size="25px" maxlength="50" value="<?php echo $isi['TglTransaksi']; ?>"></td>
                    </tr>

                    <tr>
                        <td>Tanggal Ambil</td>
                    </tr>
                    <tr>
                        <td><input type="date" name="TglAmbil" size="25px" maxlength="50" value="<?php echo $isi['TglAmbil']; ?>"></td>
                    </tr>

                    <tr>
                        <td>Diskon</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="Diskon" size="25px" maxlength="20" value="<?php echo $isi['Diskon']; ?>"></td>
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