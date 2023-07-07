<?php
// Script by Ichlas Wardy Gustama
 
session_start();
if(!isset($_SESSION['username'])) {
header('location:index.html'); }
else { $username = $_SESSION['username']; }
require_once("koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);

$user = mysql_query("SELECT * FROM user");
$transaksi = mysql_query("SELECT * FROM historyall");
$totaluser = mysql_num_rows($user);
$totaltransaksi = mysql_num_rows($transaksi);


$query1 = mysql_query("SELECT * FROM memles WHERE reseller = '$username'");
$kontol = mysql_num_rows($query1); 

$nama = $get['nama'];
$level = $get['level'];
$saldo = number_format($get['saldo'],0,',','.');
$uplink = $get['uplink'];
$password = $get['password'];
$fbid = $get['fbid'];

if($saldo = 1e27){
$saldo = "Unlimited";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DnK-Hacks | User Area</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=""><i class="fa fa-star-o"></i> DnK-Hacks</a> 
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
             <b>   <?php echo $saldo ?> Saldo Anda </b>
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                        <a href="javascript:;" onclick="buka('fiture/cpass');">
                        <i class="fa fa-user"></i> Ganti Password
                        </a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                         <!--- <img src="logo.png" alt="DnK-Hacks" width="150" height="150">-->
                        <li>
                            <a href=""><i class="fa fa-home fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Register Member<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                            <a href="javascript:;" onclick="buka('fiture/lostsaga');">
                              <i class="fa fa-pencil"></i> Daftar Data
                            </a>
                              </li>
                                <li>
                            <a href="javascript:;" onclick="buka('fiture/perpanjang');">
                              <i class="fa fa-pencil"></i> Perpanjang Data
                            </a>
                              </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Lost Saga<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="DnKHacks/LSInject.rar"><i class="fa fa fa-download"></i> Auto Inject</a>
                                </li>
<li>
                                    <a href="DnKHacks/LS.rar"><i class="fa fa fa-download"></i> Manual Inject</a>
                                </li>
                                <li>
                                    <a href="serial.rar"><i class="fa fa fa-download"></i> Serial Check</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Point Blank<span class="fa arrow"></span>[ Coming Soon ]</a>
                            <ul>
                                <li>
                                    <a href="DnKHacks/PB.rar"><i class="fa fa fa-download"></i> PointBlankID</a>
                                </li>
                                <li>
                                    <a href="serial.rar"><i class="fa fa fa-download"></i> Serial Check</a>
                                </li>
                            </ul>
                        </li>

                        
<?php if($level == 'CEO &reg') { ?>
                        <li>
                            <a href="#"><i class="fa fa-cogs"></i> CEO Panel<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                        <li>
                        <a href="javascript:;" onclick="buka('fiture/tambahuser');">
                        <i class="fa fa-user"></i> Tambah user
                        </a>
                        </li>
                        <li>
                        <a href="javascript:;" onclick="buka('fiture/topupsaldo');">
                        <i class="fa fa-user"></i> Transfer Saldo
                        </a>
                        </li>
                        <li>
                        <a href="javascript:;" onclick="buka('fiture/hapususer');">
                        <i class="fa fa-user"></i> Santet User
                        </a>
                        </li>
                        <li>
                        <a href="javascript:;" onclick="buka('fiture/cpass');">
                        <i class="fa fa-user"></i> Ganti Password
                        </a>
                        </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        </ul>

<? } else if($level == 'Admin') { ?>
                        <li>
                            <a href="#"><i class="fa fa-cogs"></i> Admin Panel<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                        <li>
                        <a href="javascript:;" onclick="buka('fiture/tambahuser');">
                        <i class="fa fa-user"></i> Tambah user
                        </a>
                        </li>
                        <li>
                        <a href="javascript:;" onclick="buka('fiture/topupsaldo');">
                        <i class="fa fa-user"></i> Transfer Saldo
                        </a>
                        </li>
                        <li>
                        <a href="javascript:;" onclick="buka('fiture/hapususer');">
                        <i class="fa fa-user"></i> Santet User
                        </a>
                        </li>
                        <li>
                        <a href="javascript:;" onclick="buka('fiture/cpass');">
                        <i class="fa fa-user"></i> Ganti Password
                        </a>
                        </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        </ul>
<? } else if($level == 'Reseller') { ?>
                        <li>
                            <a href="#"><i class="fa fa-cogs"></i> Reseller Panel<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                        <li>
                        <a href="javascript:;" onclick="buka('fiture/cpass');">
                        <i class="fa fa-user"></i> Ganti Password
                        </a>
                        </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
<? } else { ?><? } ?>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div> <?php echo $saldo ?></div>
                                    <div>Saldo Anda</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $totaluser ?></div>
                                    <div>Total User</div> 
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $totaltransaksi ?></div>
                                    <div>Total Transaksi</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $level ?></div>
                                    <div>Level</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
<div class="alert alert-warning"> 
<marquee>
<?php
$i=0;

$tampil = mysql_query("SELECT * FROM historyall ORDER BY id DESC");

while($data = mysql_fetch_array($tampil))
 {
 $i++;
 
echo " ~ (<b>".$data[tanggal]."</b>) <i>".$data[pembeli]."</i> telah melakukan pembelian ".$data[barang]." ~";
}
?>
</marquee>
</div>

<!-- KOTAK BOX -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Kotak Box
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" id="konten">
                            <h3>
                                <small>Selamat Datang <u><b>  <?php echo $nama ?>  </b></u> di DnK-Hacks.<br/> <br/></small>
                            </h3>

<h4> Jika Cheat, Ada Masalah Hubungi Admin! </h4>

*Penting! <br/>
Peraturan [ DILANGGAR = KICK ] <br/>
<ol>
<li>Dilarang memperjual belikan ID Reseller / Member </li>
<li>Dilarang Menerima Permintaan Ganti HWID / HDSN / SERIAL </li>
<li>Jika ada buyer yang tidak mengerti cara pakai silahkan ajarkan via teamviewer </li>
<li>Harus sabar ! </li>
<li>Dilarang meninggalkan pembeli sebelum cheat nya muncul D3D Menu</li>
<li>DILARANG MAIN HARGA </li>
<li>DILARANG MELAKUKAN PENIPUAN DALAM BENTUK APAPUN ! </li>
<li>DILARANG MEMPERJUAL BELIKAN PERMANEN ! </li>
</ol>
                        <!-- /.panel-body -->
                    </div>
                     </div>
                       </div>
                    <!-- /.panel -->
                    <!-- /.col-lg-4 -->
                <div class="col-lg-4">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Kotak Hasil
                        </div>
                        <div class="panel-body" id="result">
                            <p>HASIL SUBMIT DISINI.</p>
                        </div>
                        <div class="panel-footer">
&copy 2017
                        </div>
                    </div>
                </div> 
                <!-- /.col-lg-4 -->
            </div>
   
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="vendor/raphael/raphael.min.js"></script>
    <script src="vendor/morrisjs/morris.min.js"></script>
    <script src="data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>

<script>
// Script by Sebastian Wirajaya

function buka(nama) {
$("#konten").html('<div class="portlet-heading"><div class="portlet-title"><h4>Loading konten...</h4></div><div class="clearfix"></div></div><div class="portlet-body"><div class="progress progress-striped active"><div class="progress-bar progress-bar-info" style="width: 100%"></div></div></div>');
    $.ajax({
        url : nama+'.php',
        type    : 'GET',
        dataType: 'html',
        success : function(isi){
            $("#konten").html(isi);
        },
    });
}

function post(){
    $('#result').html('<div class="progress progress-striped active"><div class="progress-bar progress-bar-inverse" style="width: 100%"></div></div>');
    $("input").attr("disabled", "disabled");
    $("select").attr("disabled", "disabled");
    $("button").attr("disabled", "disabled");
    $("textarea").attr("disabled", "disabled");
}
function hasil(){
    $("input").removeAttr("disabled");
    $("select").removeAttr("disabled");
    $("button").removeAttr("disabled");
    $("textarea").removeAttr("disabled");
}
</script>
</body>

</html>
