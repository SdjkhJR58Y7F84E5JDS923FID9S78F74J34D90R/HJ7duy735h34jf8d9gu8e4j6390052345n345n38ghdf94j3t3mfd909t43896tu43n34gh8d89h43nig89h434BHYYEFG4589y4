<?php
session_start();
if(!isset($_SESSION['username'])) {
die("<script>window.location = '/'</script>");
} else{
}?>
<?php
function acak($panjang)
{
	$karakter= '1234567890AQWVXCO';
	$string = '';
	for ($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter{$pos};
	}
	return $string;
}
require("../koneksi.php");
$user = $_SESSION['username']; 
$query = mysql_query("SELECT * FROM user WHERE username = '$user'");
$hasil = mysql_fetch_array($query);
$nama=$_POST['nama'];
$hwid=$_POST['username'];
$password=$_POST['password'];
$reseller = $fet['nama'];
date_default_timezone_set('Asia/Jakarta');
$date=date('Y-m-d H:i:s');
if(!$hwid) {
  echo "Error : Masih Ada Data Yang Kosong";
 } else { 
$code1 = acak(5);
$code2 = acak(5);
$pass = $code1;
$idpb = $code2;
$cektanggal = mysql_query("SELECT * FROM member WHERE username = '$hwid'");
$cekjumlah = mysql_num_rows($cektanggal);
$cekhasil = mysql_fetch_array($cektanggal);
$tanggalsebelum = $cekhasil['expired'];
if ($_POST["durasi"] == '1') {
$fee='22000';
$durasi = '1 Hari';
$newdate = strtotime ( '+1 day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-d H:i:s' , $newdate );
$perpan = strtotime ( '+1 day' , strtotime ( $tanggalsebelum ) ) ;
$perpan2 = date ( 'Y-m-d H:i:s' , $perpan); 
} else if ($_POST["durasi"]=='2') {
$fee='40000';
$durasi = '2 Hari';
$newdate = strtotime ( '+2 day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-d H:i:s' , $newdate );
$perpan = strtotime ( '+2 day' , strtotime ( $tanggalsebelum ) ) ;
$perpan2 = date ( 'Y-m-d H:i:s' , $perpan);
} else if ($_POST["durasi"] == '3') {
$fee='60000';
$durasi = '3 Hari';
$newdate = strtotime ( '+3 day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-d H:i:s' , $newdate );
$perpan = strtotime ( '+3 day' , strtotime ( $tanggalsebelum ) ) ;
$perpan2 = date ( 'Y-m-d H:i:s' , $perpan);
} else if ($_POST["durasi"]=='7') {
$fee='100000';
$durasi = '7 Hari';
$newdate = strtotime ( '+7 day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-d H:i:s' , $newdate );
$perpan = strtotime ( '+7 day' , strtotime ( $tanggalsebelum ) ) ;
$perpan2 = date ( 'Y-m-d H:i:s' , $perpan);
} else if ($_POST["durasi"]=='30') {
$fee='220000';
$durasi = '30 Hari';
$newdate = strtotime ( '+30 day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-d H:i:s' , $newdate );
$perpan = strtotime ( '+30 day' , strtotime ( $tanggalsebelum ) ) ;
$perpan2 = date ( 'Y-m-d H:i:s' , $perpan);
} else if ($_POST["durasi"]=='60') {
$fee='150000';
$durasi = '60 Hari';
$newdate = strtotime ( '+60 day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-d H:i:s' , $newdate );
$perpan = strtotime ( '+60 day' , strtotime ( $tanggalsebelum ) ) ;
$perpan2 = date ( 'Y-m-d H:i:s' , $perpan);
} else if ($_POST["durasi"]=='90') {
$fee='200000';
$durasi = '90 Hari';
$newdate = strtotime ( '+90 day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-d H:i:s' , $newdate );
$perpan = strtotime ( '+90 day' , strtotime ( $tanggalsebelum ) ) ;
$perpan2 = date ( 'Y-m-d H:i:s' , $perpan);
} else if ($_POST["durasi"]=='99') {
$fee='300000';
$durasi = 'Permanent';
$newdate = strtotime ( '+999999 day' , strtotime ( $date ) ) ;
$newdate = date ( 'Y-m-d H:i:s' , $newdate );
$perpan = strtotime ( '+9999999 day' , strtotime ( $tanggalsebelum ) ) ;
$perpan2 = date ( 'Y-m-d H:i:s' , $perpan);
}else{
$fee = 'a';
}

if($hasil['saldo'] < $fee) {
echo 'Error : Saldo tidak mencukupi';
}else if($cekjumlah !== 0) {
echo 'Error : HDSN telah terdaftar!';
} else {
$no = rand(1111,9999);
date_default_timezone_set('Asia/Jakarta');
$tanggal = date("Y-m-d H:i:s");
$sisa = $hasil['saldo']-$fee;
$simpan = mysql_query("INSERT INTO member (`name`, `reseller`, `username`, `password`, `expired`, `status`) VALUES ('$nama', '$user', '$hwid', '12345', '$newdate', 'aktif')");
$simpan = mysql_query("INSERT INTO historyall VALUES('','$no','$user','Register Cheat All Game $durasi','$fee','Sukses','HDSN : $hwid','$tanggal')");
$simpan = mysql_query("UPDATE user SET saldo = saldo-$fee WHERE username = '$user'");
if($simpan) {
echo '<b>
==== DnK-Hacks ====<br />
No.Order : '.$no.' <br />
Uplink : '.$user.' <br />
Pembeli : '.$nama.' <br />
Paket : Register All Cheat '.$durasi.'<br />
Serial Number : '.$hwid.' <br />
Expired : '.$newdate.' <br />
Tgl. Transaksi : '.$tanggal.' <br /></b>
';
} else {
echo 'ERROR';
}
}
}
?>