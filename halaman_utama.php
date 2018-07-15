<?php
session_start();
if(empty($_SESSION['username']) AND empty($_SESSION['password']))
{
	echo "<script type='text/javascript'>
	alert('SILAKAN LOGIN TERLEBIH DAHULU!')
	window.location='index.php';
	</script>";
}
else
{
?>

<!doctype html>
<html><head>
<meta charset="utf-8">

<script type='text/javascript'>

    msg = " GREGGY LAUNDRY ONLINE ";

    msg = " | PREMIUM LAUNDRY | FREE ONGKIR | BASED MALANG KOTA --- " + msg;pos = 0;

    function scrollMSG() {

    document.title = msg.substring(pos, msg.length) + msg.substring(0, pos); pos++;

    if (pos > msg.length) pos = 0

    window.setTimeout("scrollMSG()",90);

    }

    scrollMSG();

    </script>

<link rel="stylesheet" type="text/css" href="style.css"/>
<link href='http://icons.iconarchive.com/icons/iconleak/cerulean/128/science-chemistry-icon.png' rel='SHORTCUT ICON'/>

</head>

<body>


<div id="luar">
<nav>
	<div id="menu-wrap">
    
    	<?php
			$aksi_barang = "aksi_barang.php";
			$aksi_karyawan = "aksi_karyawan.php";
			$aksi_konsumen = "aksi_konsumen.php";
			$aksi_jenislaundry = "aksi_jenislaundry.php";
			$aksi_login = "aksi_login.php";
			$aksi_pemakaian_barang = "aksi_pemakaian_barang.php";
			$aksi_rincian_pembelian = "aksi_rincian_pembelian.php";
			$aksi_rincian_transaksi = "aksi_rincian_transaksi.php";
			$aksi_pembelian = "aksi_pembelian.php";
			$aksi_supplier = "aksi_supplier.php";
			$aksi_tarif = "aksi_tarif.php";
			$aksi_transaksi = "aksi_transaksi.php";
			$beranda = "beranda.php";
			$tentang_kami = "tentang_kami.php";
			$alamat_kami = "alamat_kami.php";
			$formulir_barang = "formulir_barang.php";
			$formulir_konsumen = "formulir_konsumen.php";
			$formulir_karyawan = "formulir_karyawan.php";
			$formulir_supplier = "formulir_supplier.php";
			$formulir_tarif = "formulir_tarif.php"; 
			$formulir_jenislaundry = "formulir_jenislaundry.php";
			$formulir_login = "formulir_login.php";
			$tabel_konsumen = "tabel_konsumen.php";
			$tabel_karyawan = "tabel_karyawan.php";
			$tabel_supplier = "tabel_supplier.php";
			$tabel_jenislaundry = "tabel_jenislaundry.php";
			$tabel_barang = "tabel_barang.php";
			$tabel_pembelian = "tabel_pembelian.php";
			$tabel_tarif = "tabel_tarif.php";
			$tabel_transaksi = "tabel_transaksi.php";
			$tabel_pemakaian_barang = "tabel_pemakaian_barang.php";
			$tabel_rincian_pembelian = "tabel_rincian_pembelian.php";
			$tabel_rincian_transaksi = "tabel_rincian_transaksi.php";
			$tabel_login = "tabel_login.php";
			$kebijakan = "kebijakan.php";
		?>
    	<ul>
			<a href="halaman_utama.php?beranda=$beranda"><li id="beranda">Beranda </li></a>
			<a href="halaman_utama.php?tentang_kami=$tentang_kami"><li>Tentang Kami </li></a>
			<li>Kontak Kami
		<ul>
			<a href="halaman_utama.php?alamat_kami=$alamat_kami"><li>Alamat Kami </li></a>
			<a href="halaman_utama.php?kebijakan=$kebijakan"><li>Kebijakan & Ketentuan </li></a>
		</ul>
        	<?php
			if($_SESSION['TypeUser']=="user")
			{
			?>
        	<li id="nbsp">&nbsp;</li>
            <?php } ?>
            
        	<?php 
			if($_SESSION['TypeUser']!=="user")
			{
			?>
        	<li>Formulir Pendaftaran
           	<ul>
            	<a href="halaman_utama.php?formulir_barang=$formulir_barang"><li>Barang</li></a>
                <a href="halaman_utama.php?formulir_jenislaundry=$formulir_jenislaundry"><li>Jenis Laundry</li></a>
                <a href="halaman_utama.php?formulir_karyawan=$formulir_karyawan"><li>Karyawan</li></a>
                <?php
                if($_SESSION['TypeUser']=="admin")
				{
				?>
                <a href="halaman_utama.php?formulir_login=$formulir_login"><li>Login</li></a>
                <?php } ?>
                <a href="halaman_utama.php?formulir_konsumen=$formulir_konsumen"><li>Member</li></a>
                <a href="halaman_utama.php?formulir_supplier=$formulir_supplier"><li>Supplier</li></a>
                <a href="halaman_utama.php?formulir_tarif=$formulir_tarif"><li>Tarif</li></a>
            </ul>
            <?php } ?>
        </li>
        
            <a href="logout.php" onClick ="return confirm('Apakah anda yakin untuk logout, <?php echo $_SESSION['username']; ?>?')"><li id="logout"><b>LOGOUT</b></li></a>
		</li>
		</ul>
    </div>
    </nav>
    
    <div id="header">
    </div>
    
	<div id="isi">
    	
        <div id="menu_kiri">
        
        	<div id="menu_produk">
            
           		<h2>Pelayanan Kami</h2><hr color="#0263A0"><br>
                <p>Cuci</p>
                <p>Cuci Kering</p>
                <p>Cuci Kering Setrika</p><br>
           	
            </div>
            
            <div id="menu_kontak">
            
            	<h2>Kontak Kami</h2><hr color="#0263A0"><br>
                <p><img src="logo/bbm2.png" width="25" height="25" align="center">&nbsp;&nbsp;D0D9BE45</p>
                <p><img src="logo/wa2.png" width="25" height="25" align="center"> &nbsp;087759659653</p>
                <p><img src="logo/email2.png" width="25" height="25" align="center">&nbsp;&nbsp;greggygf@gmail.com</p><br>
            </div>
            
            <div id="menu_sosial">
            
            	<h2>Sosial Media</h2><hr color="#0263A0"><br>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.instagram.com/greg022xrv" target="_blank"><img src="logo/instagram.png" width="40" height="40" align="center">&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a href="http://www.facebook.com/bluohazard48" target="_blank"><img src="logo/facebbok.png" width="40" height="40" align="center">&nbsp;&nbsp;&nbsp;&nbsp;</a>
                <a href="http://www.twitter.com/GreggyGF" target="_blank"><img src="logo/twitter.png" width="40" height="40" align="center"><br><br></a>
            
            </div>
            
            <div id="menu_halaman">
            
            	<h2>Halaman</h2><hr color="#0263A0"><br>
                <a href="halaman_utama.php?tabel_konsumen=$tabel_konsumen"><p>Anggota Member</p></a>
                <a href="halaman_utama.php?tabel_barang=$tabel_barang"><p>Barang</p></a>
                <?php
                if($_SESSION['TypeUser']=="admin")
				{
				?>
                <a href="halaman_utama.php?tabel_login=$tabel_login"><p>Data Login</p></a>
                <?php }?>
                <a href="halaman_utama.php?tabel_pemakaian_barang=$tabel_pemakaian_barang"><p>Data Pemakaian Barang</p></a>
                <a href="halaman_utama.php?tabel_pembelian=$tabel_pembelian"><p>Data Pembelian</p></a>
                <a href="halaman_utama.php?tabel_rincian_pembelian=$tabel_rincian_pembelian"><p>Data Rincian Pembelian</p></a>
                <a href="halaman_utama.php?tabel_rincian_transaksi=$tabel_rincian_transaksi"><p>Data Rincian Transaksi</p></a>
                <a href="halaman_utama.php?tabel_transaksi=$tabel_transaksi"><p>Data Transaksi</p></a>
                <a href="halaman_utama.php?tabel_jenislaundry=$tabel_jenislaundry"><p>Jenis Laundry</p></a>
                <a href="halaman_utama.php?tabel_karyawan=$tabel_karyawan"><p>Karyawan Laundry</p></a>    
                <a href="halaman_utama.php?tabel_supplier=$tabel_supplier"><p>Supplier Laundry</p></a>
                <a href="halaman_utama.php?tabel_tarif=$tabel_tarif"><p>Tarif</p></a>
                
                <br>
                 
            </div>
            
        </div>
        
        <div id="konten">
        
        	<?php
			
				if(isset($_GET['tentang_kami']))
				{
					require_once $tentang_kami;
				}
				
				else if(isset($_GET['beranda']))
				{
					require_once $beranda;
				}
				
				else if(isset($_GET['alamat_kami']))
				{
					require_once $alamat_kami;
				}
				
				else if(isset($_GET['formulir_barang']))
				{
					require_once $formulir_barang;
				}
				
				else if(isset($_GET['formulir_konsumen']))
				{
					require_once $formulir_konsumen;
				}
				
				else if(isset($_GET['formulir_karyawan']))
				{
					require_once $formulir_karyawan;
				}
				
				else if(isset($_GET['formulir_supplier']))
				{
					require_once $formulir_supplier;
				}
				
				else if(isset($_GET['formulir_jenislaundry']))
				{
					require_once $formulir_jenislaundry;
				}
				
				else if(isset($_GET['formulir_login']))
				{
					require_once $formulir_login;
				}
				
				else if(isset($_GET['formulir_tarif']))
				{
					require_once $formulir_tarif;
				}
				
				else if(isset($_GET['tabel_konsumen']))
				{
					require_once $tabel_konsumen;
				}
				
				else if(isset($_GET['tabel_jenislaundry']))
				{
					require_once $tabel_jenislaundry;
				}
				
				else if(isset($_GET['tabel_karyawan']))
				{
					require_once $tabel_karyawan;
				}
				
				else if(isset($_GET['tabel_supplier']))
				{
					require_once $tabel_supplier;
				}
				
				else if(isset($_GET['tabel_barang']))
				{
					require_once $tabel_barang;
				}
				
				else if(isset($_GET['kebijakan']))
				{
					require_once $kebijakan;
				}
				
				else if(isset($_GET['tabel_tarif']))
				{
					require_once $tabel_tarif;
				}
				
				else if(isset($_GET['tabel_login']))
				{
					require_once $tabel_login;
				}
				
				else if(isset($_GET['tabel_transaksi']))
				{
					require_once $tabel_transaksi;
				}
				
				else if(isset($_GET['tabel_pembelian']))
				{
					require_once $tabel_pembelian;
				}
				
				else if(isset($_GET['tabel_pemakaian_barang']))
				{
					require_once $tabel_pemakaian_barang;
				}
				
				else if(isset($_GET['tabel_rincian_pembelian']))
				{
					require_once $tabel_rincian_pembelian;
				}
				
				else if(isset($_GET['tabel_rincian_transaksi']))
				{
					require_once $tabel_rincian_transaksi;
				}
				
				else if(isset($_GET['aksi_karyawan']))
				{
					require_once $aksi_karyawan;
				}
				
				else if(isset($_GET['aksi_jenislaundry']))
				{
					require_once $aksi_jenislaundry;
				}
			
				else if(isset($_GET['aksi_barang']))
				{
					require_once $aksi_barang;
				}
				
				else if(isset($_GET['aksi_konsumen']))
				{
					require_once $aksi_konsumen;
				}
				
				else if(isset($_GET['aksi_login']))
				{
					require_once $aksi_login;
				}
				
				else if(isset($_GET['aksi_supplier']))
				{
					require_once $aksi_supplier;
				}
				
				else if(isset($_GET['aksi_tarif']))
				{
					require_once $aksi_tarif;
				}
				
				else if(isset($_GET['aksi_transaksi']))
				{
					require_once $aksi_transaksi;
				}
				
				else if(isset($_GET['aksi_pembelian']))
				{
					require_once $aksi_pembelian;
				}
				
				else if(isset($_GET['aksi_pemakaian_barang']))
				{
					require_once $aksi_pemakaian_barang;
				}
				
				else if(isset($_GET['aksi_rincian_pembelian']))
				{
					require_once $aksi_rincian_pembelian;
				}
				
				else if(isset($_GET['aksi_rincian_transaksi']))
				{
					require_once $aksi_rincian_transaksi;
				}
			
			
			?>
        
        </div>
        
        
    </div>
    
    <div id="footer">© 2016 Greggy Gianini Firmansyah
    </div>

</div>
    
</body>
</html>

<?php } ?>