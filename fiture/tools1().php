<?php
session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
include "../koneksi.php";

$hdsn = $_POST['hdsn'];
$hdsn2 = $_POST['hdsn2'];
$tipe = $_POST['tipe'];
$query = mysql_query("SELECT * FROM member WHERE reseller = '$username' ORDER BY id DESC");
$mario = mysql_fetch_array($query);

if(!$hdsn) {
  echo "Error : Masih Ada Data Yang Kosong";
 } else { 
if(mysql_num_rows($query) <> 0) {
echo "ERROR : Serial belum terdaftar Dan Jangan Change Atau Delete Serial Reseller Lain";
} else {
if($tipe == 1) {
$tipe2 ="Delete Serial Number";
$kosirot ="Serial Number: $hdsn<br />";
$save = mysql_query("DELETE FROM member WHERE username = '$hdsn' ORDER BY id DESC");
} else if($tipe == 2) {
$tipe2 ="Change Serial Number";
$kosirot ="Current Serial Number: $hdsn<br />
New Serial Number : $hdsn2<br />";
$save = mysql_query("UPDATE member SET username = '$hdsn2' ORDER BY id DESC");
}
if($save) { ?>
==== DnK-Hacks ====<br />
<?php echo $tipe2; ?></br>
<?php echo $kosirot; ?>
<? } else { ?>
ERROR ... Failed
<?php }
}
}
?>