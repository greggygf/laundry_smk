<body>
    <?php

    include "../config/koneksi.php";
    $NoPembelian = $_POST['NoPembelian'];
    $aksi = strtolower($_POST['proses']);

    if ($aksi == "delete") {

        $deletePembelian = "DELETE from pembelian where NoPembelian='$NoPembelian'";

        $deletePembelian_query = mysqli_query($connect, $deletePembelian);

        if ($deletePembelian_query) {
            echo "<br><hr color=`#0263A0`><br>	Delete berhasil dijalankan! Untuk melihat kembali data pembelian,silakan klik"; ?><a href="halaman_utama.php?tabel_pembelian=$tabel_pembelian"> <input type="button" class="tombol" value="Back"></a>

        <?php
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        $query = mysqli_query($connect, "select * from pembelian where NoPembelian='$NoPembelian'");
        $query2 = mysqli_query($connect, "select NmKaryawan from karyawan k,pembelian p where p.NIK = k.NIK AND NoPembelian='$NoPembelian'");
        $query3 = mysqli_query($connect, "select NmSupplier from supplier s,pembelian p where p.IDSupplier = s.IDSupplier AND NoPembelian='$NoPembelian'");
        ?>


        <form action="../process/update/update_pembelian.php" method="POST">

            <h2>Update Data Pembelian</h2>
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
                            <td>Nama Supplier</td>
                        </tr>

                        <tr>
                            <td><input type="text" name='NmSupplier' size="25px" maxlength="20" value="<?php echo $isi3['NmSupplier']; ?>" style="color:#888;" readonly></td>
                        </tr>

                    <?php } ?>

                    <tr>
                        <td>No.Pembelian</td>
                    </tr>
                    <tr>
                        <td><input type="text" name='NoPembelian' size="25px" maxlength="20" value="<?php echo $NoPembelian; ?>" style="color:#888;" readonly></td>
                    </tr>

                    <tr>
                        <td>Tanggal Pembelian</td>
                    </tr>
                    <tr>
                        <td><input type="date" name="TglPembelian" size="25px" maxlength="50" value="<?php echo $isi['TglPembelian']; ?>"></td>
                    </tr>

                    <tr>
                        <td>Total Biaya</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="TotalBiaya" size="25px" maxlength="20" value="<?php echo $isi['TotalBiaya']; ?>"></td>
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