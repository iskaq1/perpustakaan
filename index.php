<?php
session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
?>

<title>Halaman Sukses Login ssss</title>

<center>
<?php
echo "Selamat Datang, <b>$username</b> ";
?>

</center>
<?php include "layout/header.php" ?>
	<div id="content" class="container">
		<div class="row">
			<div id="main_content" class="col-sm-8">
				<H1>SELAMAT DATANG DI WEB PERPUSTAKAAN</H1>
				<H1>DAN TERIMA KASIH TELAH SINGGAH</H1>
			</div>
			<?php include "layout/sidebar.php"; ?>
		</div>
	</div>

<?php include "layout/footer.php";	?>