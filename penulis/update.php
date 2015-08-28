<?php

//error_reporting(E_ALL);
if(isset($_POST['id'])){
include "../include/conn.php";
	$id = $_POST ['id'];
	$nama = $_POST ['nama'];
	$alamat = $_POST ['alamat'];
	$telepon = $_POST ['telepon'];
	$sql = mysql_query("UPDATE penulis SET
				nama = '".$nama."',
				alamat = '".$alamat."',
				telepon = '".$telepon."'
				WHERE id ='".$id."';") or die(mysql_error());
	header("location: index.php?id=".$id);
}
?>
<?php include "../layout/header.php" ?>
	<div id="content" class="container">
		<div class="row">
			<div id="main_content" class="col-sm-8">
				<div id="update-buku">
					<form action="" method="post">
					<?php
						$conn=mysql_connect("localhost","root",""); 
						mysql_select_db("perpustakaan"); 
						$id = $_GET['id'];
						$sql="select * from penulis WHERE id = ".$_GET['id']; 
						$hasil=mysql_query($sql,$conn); 

					?>

					<?php 
						$judul = "";
						while($data = mysql_fetch_array($hasil)) {
							$nama = $data['nama'];
							$alamat = $data['alamat'];
							$telepon = $data['telepon'];
						}
					?>

					<table border="1">
						<tr>
							<td colspan="2"><h2>Update Data Perpustakaan</h2></td>
						</tr>
						<tr>
							<td>NAMA</td>
							<td>
								<label>
									<input name="nama" type="text" id="nama" size="50" maxlength="50" value="<?php print $nama; ?>" />
								</label>
							</td>
						</tr>
						<tr>
							<td>ALAMAT</td>
							<td>
								<label>
									<input name="alamat" type="text" id="alamat" size="50" maxlength="20" value="<?php print $alamat; ?>" />
								</label>
							</td>
						</tr>
						<tr>
							<td>TELEPON</td>
							<td>
								<label>
									<input name="telepon" type="text" id="telepon" size="50" maxlength="50" value="<?php print $telepon; ?>" />
								</label>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<label>
									<input type="hidden" name="id" id="id" value="<?php print $_GET['id']; ?>" />
									<input type="submit" name="submit" id="submit" value="SAVE DATA" />
								</label>
							</td>
						</tr>
					</table>
				</form>
				</div>
				<div></div>
			</div>
			<?php include "../layout/sidebar.php"; ?>
		</div>
	</div>

<?php include "../layout/footer.php";	?>
