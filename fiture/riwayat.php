<?php
//Script by Sobri Waskito Aji Jr.

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");
?>
<div class="main-box">
<header class="main-box-header clearfix">
<h2 class="pull-left">History Transaksi</h2>
</header>
<div class="main-box-body clearfix">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Nomor</th>
                                                    <th>Pembeli</th>
                                                    <th>Barang</th>
                                                    <th>Status</th>
                                                    <th>Data</th>
                                                    <th>Harga</th>
<th>Tanggal Transaksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$i=0;

$tampil = mysql_query("SELECT * FROM historyall WHERE pembeli = '$username' ORDER BY id DESC");

while($data = mysql_fetch_array($tampil))
 {
 $i++;
 
echo "
<tr>
 <td>".$data[id]."</td>
 <td>".$data[no]."</td>
 <td>".$data[pembeli]."</td>
 <td>".$data[barang]."</td>
 <td>".$data[status]."</td>
 <td>".$data[data]."</td>
 <td>".$data[harga]."</td>
<td>".$data[tanggal]."</td>
</tr>";
}
?>
                                            </tbody>
                                        </table>
                                    </div>