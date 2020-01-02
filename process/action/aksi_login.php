<body>
    <?php
    include "../config/koneksi.php";
    $NIK = $_POST['NIK'];
    $aksi = strtolower($_POST['proses']);

    if ($aksi == "delete") {

        $deleteLogin = "DELETE from login where NIK='$NIK'";

        $deleteLogin_query = mysqli_query($connect, $deleteLogin);

        if ($deleteLogin_query) {
            echo "<br><hr color=`#0263A0`><br>	Delete berhasil dijalankan! Untuk melihat kembali data Login,silakan klik"; ?><a href="halaman_utama.php?tabel_login=$tabel_login"> <input type="button" class="tombol" value="Back"></a>

        <?php
        } else {
            echo "Delete gagal dijalankan";
        }
    } else {

        $query = mysqli_query($connect, "select * from login where NIK='$NIK'");
        $query2 = mysqli_query($connect, "select * from karyawan where NIK='$NIK'");
        ?>

        <form action="../process/update/update_login.php" method="POST">

            <h2>Update Data Login</h2>
            <hr color="#0263A0"><br>

            <table>

                <?php
                while ($isi = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td>NIK</td>
                    </tr>

                    <tr>
                        <td>
                            <input type="text" name='NIK' size="25px" value="<?php echo $isi['NIK']; ?>" maxlength="5" style="color:#888;" readonly></td>
                    </tr>

                    <tr>
                        <td>Nama Karyawan</td>
                    </tr>

                    <tr>
                        <td>
                            <?php while ($isi2 = mysqli_fetch_array($query2)) {
                                $NmKaryawan = $isi2['NmKaryawan'] ?>

                                <input type="text" size="25px" value="<?php echo $NmKaryawan; ?>" maxlength="5" style="color:#888;" readonly></td>
                    </tr>

                <?php } ?>

                <tr>
                    <td>Username</td>
                </tr>
                <tr>
                    <td><input type="text" name='username' size="25px" maxlength="10" value="<?php echo $isi['username']; ?>"></td>
                </tr>

                <tr>
                    <td>Password</td>
                </tr>
                <tr>
                    <td><input type="password" name="password" size="25px" maxlength="10" value="<?php echo $isi['password']; ?>"></td>
                </tr>

                <tr>
                    <td>Type User</td>
                </tr>
                <tr>
                    <td>
                        <select name="TypeUser">
                            <?php if ($isi['TypeUser'] == "admin") { ?>
                                <option value="admin" selected>Admin</option>
                                <option value="operator">Operator</option>
                                <option value="user">User</option>
                            <?php
                            } else if ($isi['TypeUser'] == "operator") { ?>
                                <option value="admin">Admin</option>
                                <option value="operator" selected>Operator</option>
                                <option value="user">User</option>
                            <?php
                            } else { ?>
                                <option value="admin">Admin</option>
                                <option value="operator">Operator</option>
                                <option value="user" selected>User</option>
                            <?php
                            } ?>
                        </select>
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