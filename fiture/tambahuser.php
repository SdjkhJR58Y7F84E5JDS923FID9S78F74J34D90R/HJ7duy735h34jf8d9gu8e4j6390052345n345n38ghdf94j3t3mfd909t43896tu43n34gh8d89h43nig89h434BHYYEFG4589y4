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
<?php if($get['level'] == Reseller) { ?>
<div class="alert alert-danger">
Gagal : Tidak ada akses
</div>
<? } else { ?>
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>Tambah User</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">  

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nama</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="namae" id="namae" placeholder="Masukkan Nama Buyer"/>
                                            </div> <br/>
                                        </div>           
<br>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username"/>
                                            </div> <br/>
                                        </div>           
<br>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="password" id="password" placeholder="Masukkan Password"/>
                                            </div> <br/>
                                        </div>           
<br>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Level</label>
                                            <div class="col-md-9">                                        
                                                <select class="form-control select" id="level" name="level"> 
<option value="Reseller">Reseller [ Bonus 150.000 Saldo ]</option>
                                                </select>
                                            </div>
                                        </div>
<br />

                                        <div data-toggle="modal" data-target="#zonk" class="form-group"> <br/>
<button class="btn btn-primary btn-block" id="btnLogin" onclick="tambahuser();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<div class="alert alert-info">
JADI ADMIN JANGAN NAKAL !!!
</div>
                                </div>

<script>
function tambahuser()
{
post();
	var namae = $('#namae').val();
	var username = $('#username').val();
	var password = $('#password').val();
	var level = $('#level').val();
	$.ajax({
		url	: 'fiture/tambahuser().php',
		data	: 'namae='+namae+'&username='+username+'&password='+password+'&level='+level,
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>

<? } ?>