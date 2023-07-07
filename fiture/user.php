<?php
//Script by Sebastian Wirajaya

session_start();

if(!isset($_SESSION['username'])) {
header('location:../login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>
<?php if($get['level'] !== "CEO &reg" && "Admin") { ?>
<div class="alert alert-danger">
Gagal : Tidak ada akses
</div>
<? } else { ?>
                        <div class="panel panel-default">
                            <div class="panel-fb instagram-color">
                                <h5>
                                    <big><span class="entypo-home "> Check User</span>&nbsp;</big>

                                </h5>
                            </div>
                            <div class="panel-body" style="color : black;">

                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Level</th>
                                                    <th>Saldo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
<?php
$i=0;

$tampil = mysql_query("SELECT * FROM user ORDER BY id DESC");

while($data = mysql_fetch_array($tampil))
 {
 $i++;
 
echo "
<tr>
 <td>".$data[nama]."</td>
 <td>".$data[username]."</td>
 <td>".$data[password]."</td>
 <td>".$data[level]."</td>
 <td>".$data[saldo]."</td>
</tr>";
}
?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
<? } ?>