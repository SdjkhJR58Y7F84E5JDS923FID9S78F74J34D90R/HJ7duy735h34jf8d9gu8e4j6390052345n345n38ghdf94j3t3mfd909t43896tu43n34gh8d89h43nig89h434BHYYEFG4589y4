<h3>Perpanjang</h3>
<p>
<label>Serial Number</label>
<span class="field"><input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Serial Number" /></span>
	</p>
                        <p>
                            <label>Paket</label>
                            <span class="field">
                            <select name="durasi" id="durasi" class="form-control input-sm">							
<option value='1'>1 Hari</option>
<option value='2'>2 Hari</option>
<option value='3'>3 Hari</option>
<option value='7'>7 Hari</option>
<option value='30'>30 Hari</option>
</select>
<i>

<pre>
    KESALAHAN SUBMIT BUKAN TANGGUNG JAWAB ADMIN <br/>
DAN TIDAK ADA REFUND JIKA SALAH SUBMIT </br>
INFO! <br/>
*Harga Jual Server
1 Hari : 15.000 Saldo
2 Hari : 28.000 Saldo
3 Hari : 41.000 Saldo
7 Hari : 89.000 Saldo
30 Hari : 235.000 Saldo

*Harga Jual Minimum
1 Hari : 20.000 Saldo
2 Hari : 35.000 Saldo
3 Hari : 50.000 Saldo
7 Hari : 100.000 Saldo
30 Hari : 250.000 Saldo

Reseller yang memberikan Harga kurang dari HARGA JUAL MINIMUM <br/>
AKAN DI DELETE TANPA REFUND
</pre>
								</i>
</span>
</p>
									<div class="form-group">
<button class="btn btn-primary btn-block" id="btnLogin" onclick="proses();" ><i class="fa fa-mail-forward" name="proces" type="submit"></i> Submit</button> 
                                        </div>
</form>
<script>
function proses()
{
post();
var nama = $('#nama').val();
var username = $('#username').val();
var password = $('#password').val();
var durasi = $('#durasi').val();
	$.ajax({
		url	: 'fiture/perpanjang().php',
		data: {username: username,password: password,nama: nama,durasi: durasi},
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>