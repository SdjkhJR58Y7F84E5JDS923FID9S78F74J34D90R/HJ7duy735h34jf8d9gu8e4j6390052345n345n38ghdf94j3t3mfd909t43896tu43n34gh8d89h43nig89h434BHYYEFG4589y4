<?php
// Script by Sebastian Wirajaya Licensed

session_start();
if(!isset($_SESSION['username'])) {
header('location:../tools/login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>

<?php
  require_once("../koneksi.php");
  $username1 = $_POST['username'];

  $cekuser = mysql_query("SELECT * FROM user WHERE username = '$username1'");  
  $dapat = mysql_num_rows($cekuser);
  $data = mysql_fetch_array($cekuser);

  if($dapat == 0) { ?>
<div class="alert alert-danger">
Gagal : Username tidak terdaftar.
</div>
<? } else if(!$username) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
 $simpan = mysql_query("DELETE FROM user WHERE username = '$username1'");
 if($simpan) { ?>
                                    <table class="table table-boxed">
                                        <tbody>
                                                <div class="alert alert-success">Hapus Anggota Sukses!</div>
                                            <tr>
                                                <th><i class="fa fa-user"></i></th>
                                                <td><?php echo $username1 ?></td>
                                            </tr>
                                            <tr>
                                                <th><i class="fa fa-shopping-cart"></i></th>
                                                <td>Kick Anggota</td>
                                            </tr>
                                            <tr>
                                                <th><i class="fa fa-level-up"></i></th>
                                                <td><?php echo $username ?></td>
                                            </tr>
                                        </tbody>
                                    </table><!--//table-->
</center></div>
<? } else { ?>
ERROR
<? }
?>
<? }
?>