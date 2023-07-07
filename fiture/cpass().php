<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
if(!isset($_SESSION['username'])) {
header('location:../tools/login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");
$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
$hasil = mysql_fetch_array($query);
$ucer = $get['username'];
$pass = $get['password'];

////// LOAD DATABASE FROM HERE /////////
?>
<?php
$passwordbaru = $_POST['passwordbaru'];
$cekuser = mysql_query("SELECT * FROM user WHERE password = '$passwordbaru'"); 
$cekuserlama = mysql_query("SELECT * FROM user WHERE password = '$passwordbaru'");  
if(!$pass) {
echo "QUERY ERROR : No data received";
} else if(!$passwordbaru) {
echo "QUERY ERROR : No data received";
} else {
$simpan = mysql_query("UPDATE user SET password = '$passwordbaru' WHERE username = '$ucer'");
if($simpan) { ?>
-------------------------------------------------------------------<br>
Change Password Success<br>
-------------------------------------------------------------------<br>
Username : <?php echo $ucer; ?><br>
Password Lama : <?php echo $pass; ?><br>
Password Baru : <?php echo $passwordbaru; ?><br>
-------------------------------------------------------------------<br>
Terimakasih telah melakukan penggantian password . Jika Ada Masalah Silakan Contact Admin<br>
-------------------------------------------------------------------<br>
<? } else {
echo "Error : failed..";
}
}
?>