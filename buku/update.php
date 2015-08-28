<?php

//error_reporting(E_ALL);
if(isset($_POST['id'])){
include "../include/conn.php";
	$id = $_POST ['id'];
	$judul = $_POST ['judul'];
	$isbn = $_POST ['isbn'];
	$sinopsis = $_POST ['sinopsis'];
	$sampul = $_POST ['sampul'];
	$kategori = $_POST ['kategori'];
	$penulis = $_POST ['penulis'];
	$penerbit = $_POST ['penerbit'];
	$sql = mysql_query("UPDATE buku SET
				judul = '".$judul."',
				isbn = '".$isbn."',
				sinopsis = '".$sinopsis."',
				sampul = '".$sampul."',
				id_kategori = '$kategori',
				id_penulis = '$penulis',
				id_penerbit = '$penerbit'
				WHERE id ='".$id."';") or die(mysql_error());
	print $id;
	print $judul;
	print $isbn;
	print $sinopsis;
	print $sampul;
	print $kategori;
	print $penulis;
	print $penerbit;

	header("location: index.php?id=".$id);
}
	
?>
<?php
		$conn = mysql_connect("localhost","root","");
		mysql_select_db("perpustakaan",$conn);
		$sql_1 = mysql_query("SELECT `id`,`nama` FROM `penulis`");
		$sql_2 = mysql_query("SELECT `id`,`nama` FROM `penerbit`");
		$sql_3 = mysql_query("SELECT `id`,`nama` FROM `kategori`");
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
						$sql="select * from buku WHERE id = ".$_GET['id']; 
						$hasil=mysql_query($sql,$conn); 

					?>

					<?php 
						$judul = "";
						while($data = mysql_fetch_array($hasil)) {
							$judul = $data['judul'];
							$isbn = $data['isbn'];
							$sinopsis = $data['sinopsis']; 
							$sampul = $data['sampul'];
							$id_kategori = $data['id_kategori'];
							$id_penulis = $data['id_penulis'];
							$id_penerbit = $data['id_penerbit'];
						}
					?>

					<table border="1">
						<tr>
							<td colspan="2"><h2>Update Data Perpustakaan</h2></td>
						</tr>
						<tr>
							<td>JUDUL BUKU</td>
							<td>
								<label>
									<input name="judul" type="text" id="judul" size="50" maxlength="50" value="<?php print $judul; ?>" />
								</label>
							</td>
						</tr>
						<tr>
							<td>ISBN</td>
							<td>
								<label>
									<input name="isbn" type="text" id="isbn" size="50" maxlength="20" value="<?php print $isbn; ?>" />
								</label>
							</td>
						</tr>
						<tr>
							<td>SINOPSIS</td>
							<td>
								<label>
									<input name="sinopsis" type="text" id="sinopsis" size="50" maxlength="50" value="<?php print $sinopsis; ?>" />
								</label>
							</td>
						</tr>
						<tr>
							<td>SAMPUL</td>
							<td>
								<label>
									<input name="sampul" type="text" id="sampul" size="50" maxlength="50" value="<?php print $sampul; ?>" />
								</label>
							</td>
						</tr>
						<tr>
							<td>KATEGORI</td>
							<td>
								<select name="kategori" id="kategori">
									<option>--Silahkan pilih--</option>
									<?php
									while($view_1 = mysql_fetch_array($sql_3)) {
										if ($view_1['id']!="") {
											
											if($view_1['id']==$id_kategori)
											{
												echo "<option selected value='". $view_1['id']."'>". $view_1['nama']."
												</option>";
											} else {
												echo "<option value='". $view_1['id']."'>". $view_1['nama']."
												</option>";
											}
										} 
										else{
											echo "<option value='<?php print $kategori; ?>'>tidak ada data</option>";
										}
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>PENULIS</td>
							<td>
								<select name="penulis" id="penulis" empty="ok">
									<option>--Silahkan pilih--</option>
									<?php
									while($view_1 = mysql_fetch_array($sql_1)) {
										if ($view_1['id']!="") {
											
											if($view_1['id']==$id_penulis)
											{
												echo "<option selected value='". $view_1['id']."'>". $view_1['nama']."
												</option>";
											} else {
												echo "<option value='". $view_1['id']."'>". $view_1['nama']."
												</option>";
											}
										} 
										else{
											echo "<option value='<?php print $penulis; ?>'>tidak ada data</option>";
										}
									}
									?>
								</select>
							</td>
						</tr>
						<td>PENERBIT</td>
							<td>
								<select name="penerbit" id="penerbit">
									<option>--Silahkan pilih--</option>
									<?php
									while($view_1 = mysql_fetch_array($sql_2)) {
										if ($view_1['id']!="") {
											
											if($view_1['id']==$id_penerbit)
											{
												echo "<option selected value='". $view_1['id']."'>". $view_1['nama']."
												</option>";
											} else {
												echo "<option value='". $view_1['id']."'>". $view_1['nama']."
												</option>";
											}
										} 
										else{
											echo "<option value='<?php print $penerbit; ?>'>tidak ada data</option>";
										}
									}
									?>
								</select>
							</td>
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
