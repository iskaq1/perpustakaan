<?php
if (isset($_POST['id'])) {
include "../include/conn.php";
$Nama = $_POST ['nama'];
$error = 0;
if (trim($Nama)=="") {
	echo "Masih Kosong,ulangi kembali";
	$error = 1;
}
{
	$sql = "INSERT INTO kategori SET
			Nama = '$Nama'
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
			<div id="input-kategori">
				<form action="" method="post" name="form1" target="_self" id="form1">
					<div>&nbsp;</div>
					<div>&nbsp;</div>
					<h2>Input Data kategori</h2>
					<div class="form-group">
            			<label>ketegori</label>
          					<input name="nama" type="text" id="nama" class="form-control"  />
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