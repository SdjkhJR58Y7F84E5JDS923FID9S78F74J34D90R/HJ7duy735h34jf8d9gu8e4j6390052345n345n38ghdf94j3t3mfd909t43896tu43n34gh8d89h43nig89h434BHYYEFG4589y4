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


$query1 = mysql_query("SELECT * FROM member WHERE reseller = '$username'");
$kontol = mysql_num_rows($query1); 

$nama = $get['nama'];
$level = $get['level'];
$saldo = number_format($get['saldo'],0,',','.');
$uplink = $get['uplink'];
$password = $get['password'];
$fbid = $get['fbid'];

if($get['saldo'] == "1e27"){
$saldo = "Unlimited";
}

?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from ashobiz.dreamhosters.com/wrapbootstrap/mac531/macadmin/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Aug 2017 18:35:55 GMT -->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>DnK-Hacks | User Area</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">


  <!-- Stylesheets -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Font awesome icon -->
  <link rel="stylesheet" href="css/font-awesome.min.css"> 
  <!-- jQuery UI -->
  <link rel="stylesheet" href="css/jquery-ui.css"> 
  <!-- Calendar -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <!-- prettyPhoto -->
  <link rel="stylesheet" href="css/prettyPhoto.css">  
  <!-- Star rating -->
  <link rel="stylesheet" href="css/rateit.css">
  <!-- Date picker -->
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
  <!-- CLEditor -->
  <link rel="stylesheet" href="css/jquery.cleditor.css"> 
  <!-- Data tables -->
  <link rel="stylesheet" href="css/jquery.dataTables.css"> 
  <!-- Bootstrap toggle -->
  <link rel="stylesheet" href="css/jquery.onoff.css">
  <!-- Main stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  <!-- Widgets stylesheet -->
  <link href="css/widgets.css" rel="stylesheet">   
  
  <script src="js/respond.min.js"></script>
  <!--[if lt IE 9]>
  <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Favicon -->
  <link rel="shortcut icon" href="logo.png">
</head>

<body>

<div class="navbar navbar-fixed-top bs-docs-nav" role="banner">
  
    <div class="conjtainer">
      <!-- Menu button for smallar screens -->
      <div class="navbar-header">
		  <button class="navbar-toggle btn-navbar" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
			<span>Menu</span>
		  </button>
		  <!-- Site name for smallar screens -->
		  <a href="/" class="navbar-brand hidden-lg">DnK-Hacks</a>
		</div>
      
      

      <!-- Navigation starts -->
      <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">         

        <ul class="nav navbar-nav">  

       

        <!-- Search form -->
        <form class="navbar-form navbar-left" role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form></ul>
        <!-- Links -->
        <ul class="nav navbar-nav pull-right">
          <li class="dropdown pull-right">            
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <i class="fa fa-user"></i> <?php echo $nama ?> <b class="caret"></b>              
            </a>
            
            <!-- Dropdown menu -->
            <ul class="dropdown-menu">
              <li><a href="javascript:;" onclick="buka('fiture/cpass');"><i class="fa fa-cogs"></i> Setting Password</a></li>
              <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a></li>
            </ul>
          </li>
          
        </ul>
      </nav>

    </div>
  </div>


<!-- Header starts -->
  <header>
    <div class="container">
      <div class="row">

        <!-- Logo section -->
        <div class="col-md-4">
          <!-- Logo. -->
          <div class="logo">
            <h1><a href="/">DnK<span>-</span<span class="bold">Hacks</span></a></h1>
            <p class="meta">Tools Reseller Cheats DnK-Hacks</p>
          </div>
          <!-- Logo ends -->
        </div>

        <div class="col-md-4">
          <div class="header-data">

            <!-- Traffic data -->
            <div class="hdata">
              <div class="mcol-left">
              </div>
              <div class="mcol-right">
              </div>
              <div class="clearfix"></div>
            </div>

            <!-- Traffic data -->
            <div class="hdata">
              <div class="mcol-left">
                <!-- Icon with red background -->
                <i class="fa fa-signal bred"></i> 
              </div>
              <div class="mcol-right">
                <!-- Number of visitors -->
                <p><a href="#"><?php echo $totaltransaksi ?></a> <em><span>Total Transaksi</span></em></p>
              </div>
              <div class="clearfix"></div>
            </div>

            <!-- Members data -->
            <div class="hdata">
              <div class="mcol-left">
                <!-- Icon with blue background -->
                <i class="fa fa-user bblue"></i> 
              </div>
              <div class="mcol-right">
                <!-- Number of visitors -->
                <p><a href="#"><?php echo $level ?></a> <em>Level</em></p>
              </div>
              <div class="clearfix"></div>
            </div>

            <!-- revenue data -->
            <div class="hdata">
              <div class="mcol-left">
                <!-- Icon with green background -->
                <i class="fa fa-money bgreen"></i> 
              </div>
              <div class="mcol-right">
                <!-- Number of visitors -->
                <p><a href="#"><?php echo $saldo ?></a><em>Saldo</em></p>
              </div>
              <div class="clearfix"></div>
          </div>
      </div>
</div>
<!-- Button section -->
        <div class="col-md-4">

          <!-- Buttons -->
          <ul class="nav nav-pills">

            <!-- Members button with number of latest members count -->
            <li class="dropdown dropdown-big">
              <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                <i class="fa fa-user"></i> Users <span   class="label label-success"><?php echo $totaluser ?></span> 
              </a>

                <ul class="dropdown-menu">
                  <li>
                    <!-- Heading - h5 -->
                    <h5><i class="fa fa-user"></i> Users</h5>
                    <!-- Use hr tag to add border -->
                    <hr />
                  </li>
                  <li>
                    <!-- List item heading h6-->
                    <h6><a href="#">Doniie Permana</a> <span class="label label-warning pull-right">CEO</span></h6>
                    <div class="clearfix"></div>
                    <hr />
                  </li>
                  <li>
                    <h6><a href="#">M Jimmy Alfindo</a> <span class="label label-warning pull-right">Admin</span></h6>
                    <div class="clearfix"></div>
                    <hr />
                  </li>                                                    
                </ul>
            </li> 

          </ul>

        </div>

        <!-- Data section -->
    </div>
  </header>

<!-- Header ends -->

<!-- Main content starts -->

<div class="content">

  	<!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

        <!--- Sidebar navigation -->
        <!-- If the main navigation has sub navigation, then add the class "has_sub" to "li" of main navigation. -->
        <ul id="nav">
          <!-- Main menu with font awesome icon -->
          <li class="open"><a href="/"><i class="fa fa-home"></i> Dashboard</a>
            <!-- Sub menu markup 
            </ul>-->
          </li>
          <li class="has_sub">
			<a href="#"><i class="fa fa-edit fa-fw"></i> Input<span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
<li>
                            <a href="javascript:;" onclick="buka('fiture/lostsaga');">
                              <i class="fa fa-pencil"></i> Reg Data
                            </a>
                              </li>
              <li>
                            <a href="javascript:;" onclick="buka('fiture/perpanjang');">
                              <i class="fa fa-pencil"></i> Perpanjang Data
                            </a>
                              </li>
              <li>
                            <a href="expired.php">
                              <i class="fa fa-pencil"></i> Check Expired
                            </a>
                              </li>
            </ul>
          </li>  
          <li class="has_sub">
			<a href="#"><i class="fa fa-files-o fa-fw"></i> LostSaga  <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
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
          <li class="has_sub">
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> PointBlank<span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="DnKHacks/PB.rar"><i class="fa fa fa-download"></i> Coming Soon</a>
                                </li>
                                <li>
                                    <a href="serial.rar"><i class="fa fa fa-download"></i> Serial Check</a>
                                </li>
                            </ul>
                        </li>    
<?php if($level == 'CEO &reg') { ?>  
		  <li class="has_sub"><a href="#"><i class="fa fa-cogs"></i> CEO Panel <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
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
                        <a href="javascript:;" onclick="buka('fiture/user');">
                        <i class="fa fa-user"></i> Check User
                        </a>
                        </li>
                        <li>
                        <a href="javascript:;" onclick="buka('fiture/transaksi');">
                        <i class="fa fa-user"></i> Check Transaksi
                        </a>
                        </li>
                        <li>
                        <a href="javascript:;" onclick="buka('fiture/hapususer');">
                        <i class="fa fa-user"></i> Delete User
                        </a>
                        </li>
            </ul>
          </li>		
<? } else if($level == 'Admin') { ?>  
          <li class="has_sub"><a href="#"><i class="fa fa-cogs"></i> Admin Panel <span class="pull-right"><i class="fa fa-chevron-right"></i></span></a>
            <ul>
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
                        <a href="javascript:;" onclick="buka('fiture/transaksi');">
                        <i class="fa fa-user"></i> Check Transaksi
                        </a>
                        </li>
            </ul>
          </li>
        </ul>
<? } else { ?><? } ?>
    </div>

    <!-- Sidebar ends -->

  	  	<!-- Main bar -->
  	<div class="mainbar">
      
	    <!-- Page heading -->
	    <div class="page-head">
	      <h2 class="pull-left"><i class="fa fa-home"></i> Dashboard</h2>

        <!-- Breadcrumb -->
        <div class="bread-crumb pull-right">
          <a href="/"><i class="fa fa-home"></i> Home</a> 
          <!-- Divider -->
          <span class="divider">/</span> 
          <a href="#" class="bread-current">Dashboard</a>
        </div>

        <div class="clearfix"></div>

	    </div>
	    <!-- Page heading ends -->



	    <!-- Matter -->

	    <div class="matter">
        <div class="container">

          <!-- Today status. jQuery Sparkline plugin used. -->

          <div class="row">
            <div class="col-md-12"> 
              <!-- List starts -->
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
            </div>
          </div>

          <!-- Today status ends -->

          <!-- Dashboard Graph starts -->

          <div class="row">
            <div class="col-md-8">

              <!-- Widget -->
              <div class="widget">
                <!-- Widget head -->
                <div class="widget-head">
                  <div class="pull-left">Form</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>              

                <!-- Widget content -->
                <div class="widget-content">
                  <div class="padd">

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
                <!-- Widget ends -->

              </div>
            </div>

            <div class="col-md-4">

              <div class="widget">

                <div class="widget-head">
                  <div class="pull-left">Result</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>             

                <div class="widget-content">
                  <div class="padd">

<div class="panel-body" id="result">
                  </div>
                </div>

              </div>

            </div>
          </div>
          <!-- Dashboard graph ends -->


          <div class="row">
            <div class="col-md-8">

              <!-- Widget -->
              <div class="widget">
                <!-- Widget head -->
                <div class="widget-head">
                  <div class="pull-left">History</div>
                  <div class="widget-icons pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>  
                  <div class="clearfix"></div>
                </div>              

                <!-- Widget content -->
                <div class="widget-content">
                  <div class="padd">

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
                        <!-- /.panel-body -->
                    </div>

                  </div>
                </div>
                <!-- Widget ends -->

              </div>
            </div>

<!-- Footer starts -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
            <!-- Copyright info -->
            <p class="copy">Copyright &copy; 2017 | <a href="http://dnk-id.net">DnK-Corporation</a> </p>
      </div>
    </div>
  </div>
</footer> 	

<!-- Footer ends -->

<!-- Scroll to top -->
<span class="totop"><a href="#"><i class="fa fa-chevron-up"></i></a></span> 

<!-- JS -->
<script src="js/jquery.js"></script> <!-- jQuery -->
<script src="js/bootstrap.min.js"></script> <!-- Bootstrap -->
<script src="js/jquery-ui.min.js"></script> <!-- jQuery UI -->
<script src="js/moment.min.js"></script> <!-- Moment js for full calendar -->
<script src="js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
<script src="js/jquery.rateit.min.js"></script> <!-- RateIt - Star rating -->
<script src="js/jquery.prettyPhoto.js"></script> <!-- prettyPhoto -->
<script src="js/jquery.slimscroll.min.js"></script> <!-- jQuery Slim Scroll -->
<script src="js/jquery.dataTables.min.js"></script> <!-- Data tables -->

<!-- jQuery Flot -->
<script src="js/excanvas.min.js"></script>
<script src="js/jquery.flot.js"></script>
<script src="js/jquery.flot.resize.js"></script>
<script src="js/jquery.flot.pie.js"></script>
<script src="js/jquery.flot.stack.js"></script>

<!-- jQuery Notification - Noty -->
<script src="js/jquery.noty.js"></script> <!-- jQuery Notify -->
<script src="js/themes/default.js"></script> <!-- jQuery Notify -->
<script src="js/layouts/bottom.js"></script> <!-- jQuery Notify -->
<script src="js/layouts/topRight.js"></script> <!-- jQuery Notify -->
<script src="js/layouts/top.js"></script> <!-- jQuery Notify -->
<!-- jQuery Notification ends -->

<script src="js/sparklines.js"></script> <!-- Sparklines -->
<script src="js/jquery.cleditor.min.js"></script> <!-- CLEditor -->
<script src="js/bootstrap-datetimepicker.min.js"></script> <!-- Date picker -->
<script src="js/jquery.onoff.min.js"></script> <!-- Bootstrap Toggle -->
<script src="js/filter.js"></script> <!-- Filter for support page -->
<script src="js/custom.js"></script> <!-- Custom codes -->
<script src="js/charts.js"></script> <!-- Charts & Graphs -->

<!-- Script for this page -->
<script type="text/javascript">
$(function () {

    /* Bar Chart starts */

    var d1 = [];
    for (var i = 0; i <= 20; i += 1)
        d1.push([i, parseInt(Math.random() * 30)]);

    var d2 = [];
    for (var i = 0; i <= 20; i += 1)
        d2.push([i, parseInt(Math.random() * 30)]);


    var stack = 0, bars = true, lines = false, steps = false;
    
    function plotWithOptions() {
        $.plot($("#bar-chart"), [ d1, d2 ], {
            series: {
                stack: stack,
                lines: { show: lines, fill: true, steps: steps },
                bars: { show: bars, barWidth: 0.8 }
            },
            grid: {
                borderWidth: 0, hoverable: true, color: "#777"
            },
            colors: ["#ff6c24", "#ff2424"],
            bars: {
                  show: true,
                  lineWidth: 0,
                  fill: true,
                  fillColor: { colors: [ { opacity: 0.9 }, { opacity: 0.8 } ] }
            }
        });
    }

    plotWithOptions();
    
    $(".stackControls input").click(function (e) {
        e.preventDefault();
        stack = $(this).val() == "With stacking" ? true : null;
        plotWithOptions();
    });
    $(".graphControls input").click(function (e) {
        e.preventDefault();
        bars = $(this).val().indexOf("Bars") != -1;
        lines = $(this).val().indexOf("Lines") != -1;
        steps = $(this).val().indexOf("steps") != -1;
        plotWithOptions();
    });

    /* Bar chart ends */

});


/* Curve chart starts */

$(function () {
    var sin = [], cos = [];
    for (var i = 0; i < 14; i += 0.5) {
        sin.push([i, Math.sin(i)]);
        cos.push([i, Math.cos(i)]);
    }

    var plot = $.plot($("#curve-chart"),
           [ { data: sin, label: "sin(x)"}, { data: cos, label: "cos(x)" } ], {
               series: {
                   lines: { show: true, fill: true},
                   points: { show: true }
               },
               grid: { hoverable: true, clickable: true, borderWidth:0 },
               yaxis: { min: -1.2, max: 1.2 },
               colors: ["#1eafed", "#1eafed"]
             });

    function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 5,
            border: '1px solid #000',
            padding: '2px 8px',
            color: '#ccc',
            'background-color': '#000',
            opacity: 0.9
        }).appendTo("body").fadeIn(200);
    }

    var previousPoint = null;
    $("#curve-chart").bind("plothover", function (event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));

        if ($("#enableTooltip:checked").length > 0) {
            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    
                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                    
                    showTooltip(item.pageX, item.pageY, 
                                item.series.label + " of " + x + " = " + y);
                }
            }
            else {
                $("#tooltip").remove();
                previousPoint = null;            
            }
        }
    }); 

    $("#curve-chart").bind("plotclick", function (event, pos, item) {
        if (item) {
            $("#clickdata").text("You clicked point " + item.dataIndex + " in " + item.series.label + ".");
            plot.highlight(item.series, item.datapoint);
        }
    });

});

/* Curve chart ends */
</script>
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

<!-- Mirrored from ashobiz.dreamhosters.com/wrapbootstrap/mac531/macadmin/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 26 Aug 2017 18:36:24 GMT -->
</html>