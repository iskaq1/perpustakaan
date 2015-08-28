<?php include "../include/fungsi.php"; ?>
<?php include "../layout/header.php" ?>

	<div id="content" class="container">
		<div class="row">
			<div id="main_content" class="col-sm-8">
					<h2>Data Buku</h2>
					
					

					<div>&nbsp;</div>

					<table class="table table-hover table-bordered"> 
					<tr>
						<th>No</th>
						<th>JUDUL</th>
						<th>ISBN</th>
						<th>KATEGORI</th>
						<th>PENULIS</th>
						<th>PENERBIT</th>
						<th>&nbsp;</th>
					</tr>

					<?php 
						$conn=mysql_connect("localhost","root",""); 
						mysql_select_db("perpustakaan"); 
						$sql="select * from buku"; 
						$hasil=mysql_query($sql,$conn); 
					?>
					<?php $no = 1; ?>
					<?php while($data = mysql_fetch_array($hasil)) { ?>

					<tr>
						<td><?php print $no; ?></td>
						<td><?php print $data['judul']; ?></td>
						<td><?php print $data['isbn']; ?></td>
						<td><?php print getNamaKategori($data['id_kategori']); ?></td>
						<td><?php print getNamaPenulis($data['id_penulis']); ?></td>
						<td><?php print getNamaPenerbit($data['id_penerbit']); ?></td>
						<td>
							<a href="pinjam.php?id=<?php print $data['id']; ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-book"></i>pinjam</a>
						</td>
					</tr>	
					<?php $no++; } ?>
				</table>
			</div><!-- #main_content -->
			<?php include "../layout/sidebar.php"; ?>
		</div>
	</div><!-- #content -->

<?php include "../layout/footer.php";	?>
