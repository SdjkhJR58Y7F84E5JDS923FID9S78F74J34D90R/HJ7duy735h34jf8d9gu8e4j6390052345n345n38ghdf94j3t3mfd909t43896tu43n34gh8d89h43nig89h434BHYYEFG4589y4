<?php
session_start();
if(!isset($_SESSION['username'])) {
die("<script>window.location = '/'</script>");
} else{
}?>
<?php 
require("../koneksi.php");
$user = $_SESSION['username']; 
$query = mysql_query("SELECT * FROM user WHERE username = '$user'");
$hasil = mysql_fetch_array($query);
$username=$_POST['username'];
$reseller = $_SESSION['username'];
date_default_timezone_set('Asia/Jakarta');
$date=date('Y-m-d H:i:s');
if(!$username) {
  echo "Error : Masih Ada Data Yang Kosong";
 } else { 
$cektanggal = mysql_query("SELECT * FROM member WHERE username = '$username'");
$cekjumlah = mysql_num_rows($cektanggal);
$cekhasil = mysql_fetch_array($cektanggal);
$tanggalsebelum = $cekhasil['expired'];
if ($_POST["durasi"] == 1) {
$fee='15000';
$durasi = '1 Hari';
$perpan = strtotime ( '+1 day' , strtotime ( $date ) ) ;
$perpan2 = date ( 'Y-m-d H:i:s' , $perpan); 

     
} else if ($_POST["durasi"]==2) {
$fee='5000';
$durasi = '2 Hari';
$perpan = strtotime ( '+2 day' , strtotime ( $date ) ) ;
$perpan2 = date ( 'Y-m-d H:i:s' , $perpan);

    
} else if ($_POST["durasi"]==3) {
$fee='40000';
$durasi = '3 Hari';
$perpan = strtotime ( '+3 day' , strtotime ( $date ) ) ;
$perpan2 = date ( 'Y-m-d H:i:s' , $perpan);

    
} else if ($_POST["durasi"]==7) {
$fee='60000';
$durasi = '7 Hari';
$perpan = strtotime ( '+7 day' , strtotime ( $date ) ) ;
$perpan2 = date ( 'Y-m-d H:i:s' , $perpan);

    
} else if ($_POST["durasi"]==30) {
$fee='90000';
$durasi = '30 Hari';
$perpan = strtotime ( '+30 day' , strtotime ( $date ) ) ;
$perpan2 = date ( 'Y-m-d H:i:s' , $perpan);

    
} else if ($_POST["durasi"]==60) {
$fee='130000';
$durasi = '60 Hari';
$perpan = strtotime ( '+60 day' , strtotime ( $date ) ) ;
$perpan2 = date ( 'Y-m-d H:i:s' , $perpan);
} else if ($_POST["durasi"]==90) {
$fee='160000';
$durasi = '90 Hari';
$perpan = strtotime ( '+90 day' , strtotime ( $date ) ) ;
$perpan2 = date ( 'Y-m-d H:i:s' , $perpan);
}else{
$fee = 'a';
}

if($hasil['saldo'] < $fee) {
echo 'Error : Saldo tidak mencukupi';
}else if($cekjumlah == 0) {
echo 'Error : HDSN belum terdaftar.';
} else {
$no = rand(1111,9999);
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d H:i:s");
$sisa = $hasil['saldo']-$fee;
$simpan = mysql_query("UPDATE user SET saldo = saldo-$fee WHERE username = '$user'");
 $simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$user','Perpanjang Cheat Lostsaga $durasi','$fee','Sukses','HDSN: $username','$tanggal')");
$simpan = mysql_query("UPDATE member  SET expired = '$perpan2' WHERE username = '$username'");
$simpan = mysql_query("UPDATE member SET status = 'aktif' WHERE username = '$username'");
if($simpan) {
echo '<b>
==== DnK-Hacks ====<br />
No.Order : '.$no.' <br />
Uplink : '.$user.' <br />
Pembeli : '.$cekhasil['name'].' <br />
Paket : Perpanjang Cheat All Cheat '.$durasi.'<br />
Serial Number : '.$username.' <br />
Expired : '.$perpan2.' <br />
Tgl. Transaksi : '.$tanggal.' <br /></b>
';
} else {
echo 'ERROR';
}
}
}
?>