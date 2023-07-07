<?php
session_start();
if(!isset($_SESSION['username'])) {
header('location:login.php'); }
else { $username = $_SESSION['username']; }
require_once("koneksi.php");

?>
<style>
fieldset {
background:  2px solid black;
border: 2px solid black;
width: 200px;
}
form {
text-align: center;
}
</style>
<center>
<fieldset>
<legend>DnK-Hacks | Checker Expired</legend>
<form method="post">
Input Serial :<input type="text" name="user" required><input type="submit" name="mario" value="Submit"></form></fieldset>
<?php
include "koneksi.php";
$userq = $_POST["user"];
$ip = $_SERVER["REMOTE_ADDR"];
$result = mysql_query("SELECT * FROM member WHERE username = '$userq'");
$jumlah = mysql_num_rows($result);
?>
<head>
<title>DnK-Hacks | Checker Expired</title>
<link href="http://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet" type="text/css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<link href="css/style.css" media="screen" rel="stylesheet">
</head>
<body>
<text style='font-family: agency fb; font-size: 20px;'>
            	<TABLE BORDER="5"    WIDTH="100%"   CELLPADDING="4" CELLSPACING="3">
                    <thead>
                        <tr>
                            <th class="center">Serial</th>
	           <th class="center">Expired</th>
	           <th class="center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
<?php
while($row = mysql_fetch_array($result)){ ?>
<tr>
<td align="center"><?php echo $userq; ?></td>
<td align="center"><?php echo $row['expired']; ?></td>
<td align="center"><?php echo $row['status']; ?></td>
</tr>
<?  }
mysql_close;
?>
                        </tr>
                    </tbody>
                </table>
</font>
</body>
<!-- Mario Source !-->