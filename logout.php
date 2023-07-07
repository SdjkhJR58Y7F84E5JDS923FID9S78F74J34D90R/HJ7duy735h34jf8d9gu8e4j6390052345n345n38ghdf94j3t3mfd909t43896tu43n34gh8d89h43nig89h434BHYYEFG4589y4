<?php
session_start();
unset($_SESSION['username']);
     header("location:login.php?pesan=2&isi=Anda berhasil logout. Silahkan login kembali untuk menggunakan fitur.");
?>
