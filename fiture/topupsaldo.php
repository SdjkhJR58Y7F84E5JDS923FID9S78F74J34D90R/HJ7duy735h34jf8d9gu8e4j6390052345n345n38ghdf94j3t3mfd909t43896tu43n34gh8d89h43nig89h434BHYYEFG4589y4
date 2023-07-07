<?php
//Script by Al Fiin

session_start();

if(!isset($_SESSION['username'])) {
header('location:../tools/login.php'); }
else { $username = $_SESSION['username']; }
require_once("../koneksi.php");

$query = mysql_query("SELECT * FROM user WHERE username = '$username'");
$get = mysql_fetch_array($query);
?>
<?php if($get['level'] == Reseller) { ?>
<div class="alert alert-info">
Failed : No access
</div>
<? } else { ?>
                            <div class="portlet-heading">
                                <div class="portlet-title">
                                    <h4>Add Balance</h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="portlet-body">
 
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Username Penerima</label>
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="penerima" id="penerima" placeholder="Username Penerima"/>
                                            </div>  <br >  
                                        </div>          
<br >     

                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Nominal Transfer</label> 
                                            <div class="col-md-9">                                      
                                            <input type="text" class="form-control" name="penerima" id="jumlah" placeholder="Rp."/>
                                            </div> <br >
                                        </div> <br/> 
   

                                        <div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="kirim();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Buy</button> 
                                        </div>

<div class="alert alert-info">
Anti BUG ! declining balance corresponding sent.
</div>
                                </div>

<script>
function kirim()
{
post();
	var penerima = $('#penerima').val();
	var jumlah = $('#jumlah').val();
	$.ajax({
		url	: 'fiture/topupsaldo().php',
		data	: 'penerima='+penerima+'&jumlah='+jumlah,
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