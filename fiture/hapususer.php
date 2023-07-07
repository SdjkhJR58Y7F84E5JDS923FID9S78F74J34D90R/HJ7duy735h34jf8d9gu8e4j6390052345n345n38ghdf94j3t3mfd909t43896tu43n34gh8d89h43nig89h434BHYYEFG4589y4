<?php
//Script by Sebastian Wirajaya

session_start();

if(!isset($_SESSION['username'])) {
header('location:../tools/login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>
<?php if($get['level'] !== CEO &reg) { ?>
<div class="alert alert-danger">
Gagal : Tidak ada akses
</div>
<? } else { ?>
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>Santet User</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body"> 
 

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="username" id="username" placeholder="Username"/>
                                            </div>
                                        </div>          
<br /> <br/> <br/>
                                        <div data-toggle="modal" data-target="#zonk" class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="hapususer();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>

<div class="alert alert-info">
Santet-lah member yg kurang asupan.
</div>
                                </div>

<script>
function hapususer()
{
post();
	var username = $('#username').val();
	$.ajax({
		url	: 'fiture/hapususer().php',
		data	: 'username='+username,
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