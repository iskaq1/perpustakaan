<?php
if (isset($_POST['id'])) {
include "../include/conn.php";

$Nama = $_POST ['nama'];
$Alamat = $_POST ['alamat'];
$Telepon = $_POST ['telepon'];
 
$error = 0;

if (trim($Nama)=="") {
	echo "Masih Kosong,ulangi kembali";
	$error = 1;
}
elseif (trim($Alamat)=="") {
	echo "Masih Kosong,Ulangi Kembali";
	$error = 1;

}
elseif (trim($Telepon)=="") {
	echo "Masih Kosong,Ulangi Kembali";
	$error = 1;
}
if($error==0)
{

	$sql = "INSERT INTO penulis SET
			nama = '$Nama',
			alamat = '$Alamat',
			telepon = '$Telepon'
			";
	
	mysql_query($sql, $koneksi) or die ("SQL Error : ".mysql_error());
	echo "Berhasil Menyimpan Data dari : <b>$Nama</b>";
	header("location: index.php?id=".$id);
}
}

?>
<?php include "../layout/header.php" ?>
	<div id="content" class="container">
		<div class="row">
			<div id="main_content" class="col-sm-8">
				<div id="input-penerbit">
				 <form action="" method="post" name="form1" target="_self" id="form1">
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<h2>Input Data PENULIS Buku</h2>
					<div class="form-group">
            			<label>NAMA PENULIS</label>
            			<input name="nama" type="text" id="nama" class="form-control"  />
          			</div>
          			<div class="form-group">
            			<label>ALAMAT</label>
           				<input name="alamat" type="text" id="alamat" class="form-control" />
         			 </div>
         			 <div class="form-group">
           				 <label>TELEPON</label>
           				<input name="telepon" type="text" id="telepon"  class="form-control" />
         			 </div>
					
				<div class="form-actions well">
					<input type="hidden" name="id" id="id" value="1">
            		<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i>simpan</button>
        		</div>
					
				</form>
				</div>
			</div>
			<?php include "../layout/sidebar.php"; ?>
		</div>
	</div>

<?php include "../layout/footer.php";	?>

