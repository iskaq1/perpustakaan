<?php include "../layout/header.php" ?>
	<div id="content" class="container">
		<div class="row">
			<div id="main_content" class="col-sm-8">
				<?php 
				$conn=mysql_connect("localhost","root",""); 
				mysql_select_db("perpustakaan"); 
				$id = $_GET['id'];
				$sql="select * from penerbit WHERE id = ".$_GET['id']; 
				$hasil=mysql_query($sql,$conn);
				?>
				<?php while($data = mysql_fetch_array($hasil)) { ?>
				<h2>Data Penerbit</h2>
				<table class="table">
				<tr>
					<th>NAMA</th>
					<td>: <?php print $data['nama']; ?></td>
				</tr>
				<tr>
					<th>ALAMAT</th>
					<td>: <?php print $data['alamat']; ?></td>
				</tr>
				<tr>
					<th>TELEPON</th>
					<td>: <?php print $data['telepon']; ?></td>
				</tr>
				</table>

				<?php } ?>
				<h2>Daftar Buku</h2>
				<?php $id = $_GET['id']; ?>
				<?php $sql = "SELECT * FROM buku WHERE id_penerbit = '$id'"; ?>
				<?php $dataBuku = mysql_query($sql); ?>
				<table class="table">
				<tr>	
					<th>No</th>
					<th>Judul</th>
					<th>Ketegori</th>
				</tr>
				<?php $no = 1; ?>
				<?php while($data = mysql_fetch_array($dataBuku)) { ?>
				<tr>
					<td><?php print $no; ?></td>
					<td><a href='../buku/view.php ?id=<?php print $data['id']; ?>' ><?php print $data['judul']; ?></td>
					<td> <?php print $data['id_kategori']; ?> </td>
				</tr>
				<?php $no++; } ?>
				</table>
			</div>
			<?php include "../layout/sidebar.php"; ?>
		</div>
	</div>

<?php include "../layout/footer.php";	?>
