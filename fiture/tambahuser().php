<?php
// Script by Ichlas Wardy Gustama

session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$hasil = mysql_fetch_array($query);
?>

<?php
  require_once("../koneksi.php");
  $username1 = $_POST['username'];
  $password = $_POST['password'];
  $namae = $_POST['namae'];
  $level = $_POST['level'];
  $harga = 50000;
  $bonus = 150000;

if ($hasil['saldo'] < $harga) { ?>
<div class="alert alert-danger">
Gagal : Saldo tidak mencukupi.
</div>
<? } else {
  $cekuser = mysql_query("SELECT * FROM user WHERE username = '$username1'");  
  if(mysql_num_rows($cekuser) <> 0) { ?>
<div class="alert alert-danger">
Gagal : Username sudah terdaftar.
</div>
<? } else if(!$username1 || !$password || !$namae ) { ?>
<div class="alert alert-danger">
Gagal : Masih ada data yang kosong.
</div>
<? } else {
$no = rand(1111,9999);
$tanggal = date("Y-m-d H:i:s");
 $simpan = mysql_query("INSERT INTO user(username, password, nama, level, saldo, uplink) VALUES('$username1', '$password', '$namae', '$level', '$bonus','$username')");
 $simpan = mysql_query("UPDATE user SET saldo=saldo-$harga WHERE username = '$username'");
  $simpan = mysql_query("INSERT INTO historyall VALUES('$no','$no','$username','Pendaftaran User Level $level','$harga','Sukses','Username : $username1 - Password : $password - Level : $level - Nama : $namae - Uplink : $fbid','$tanggal')");
 if($simpan) { ?>
 <b>Pendaftaran User</b><span class="label label-success pull-right badge">SUCCESS</span> <br />
Kamu Telah Mendaftarkan User <?php echo $level ?><br />
Username : <?php echo $username1 ?><br />
Password : <?php echo $password ?><br />
Bonus Saldo : <?php echo $bonus ?><br />
Didaftarkan Oleh : <?php echo $username ?><br />
Link Login : DnK-ID.net
<? } else { ?>
ERROR
<? }
?>
<? }
}
?>