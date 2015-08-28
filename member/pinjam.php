<?php
// error_reporting(E_ALL);
session_start();
if ($_SESSION["login"]!=1)
{
  header("location:http://localhost/Project_1/index.php");
}
?>
<?php
// include "../include/conn.php";
$conn = mysql_connect("localhost","root","");
  mysql_select_db("perpustakaan",$conn);
          $id = $_GET['id'];
            $sql="select * from buku where id =$id"; 
            $hasil=mysql_query($sql,$conn); 
           $data = mysql_fetch_array($hasil);  ?>

<?php include "../layout/header.php" ?>
  <div id="content" class="container">
    <div class="row">
      <div id="main_content" class="col-sm-8">
        
        <h1>Anda Ingin Meminjam Buku: <b><?php print $data['judul']; ?></b></h1>
        <form action="" method="post" name="form_pinjam" target="_self" id="form_pinjam">
          <div class="form-group">
            <label>Peminjam</label>
            <input type="text" class="form-control" id="user" name="user" value="<?php print $_SESSION['username']; ?>">
            <input type="hidden" id="judul" name="judul" value="<?php print $id;?>">
          </div>
          <div class="form-group">
            <label>Lama Pinjaman</label>
            <input type="text" class="form-control" id="lama" name="lama">
            <input type="hidden" id="status" name="status" value="1">
          </div>
          <div class="form-actions well">
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-ok"></i>pinjam</button>
          </div>
        </form>     
      </div>
      <?php include "../layout/sidebar.php"; ?>
    </div>
  </div>

<?php include "../layout/footer.php"; ?>
<?php
if(isset($_POST['status'])){
$judul = $_POST ['judul'];
$peminjam = $_POST ['user'];
$lama = $_POST ['lama'];
$status = $_POST ['status'];
$sql = "INSERT INTO peminjam SET
      id_buku = '$judul',
      id_user = '$peminjam',
      tanggal_pinjam = CURDATE(),
      lama = '$lama',
      tanggal_kembali = CURDATE() +'$lama',
      status_peminjam = '$status'
      ";
mysql_query($sql, $conn) or die ("SQL Error : ".mysql_error());
  header("location:index.php");
}

?>