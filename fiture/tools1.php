<p>
<label>Current HDSN</label>
<span class="field"><input type="text" name="hdsn" id="hdsn" class="form-control" placeholder="Masukkan HDSN" /></span>
</p><p>
<label>New HDSN</label>
<span class="field"><input type="text" name="hdsn2" id="hdsn2" class="form-control" placeholder="Masukkan HDSN" /></span>
</p>
<p>
<label>Type</label>
<select id='tipe' class="form-control input-sm">
<option value='2'>Change</option>
</select></p>
<input type='submit' name='proces' class='btn btn-primary' value='Submit' onclick="tools();"/></p>
<script>
function tools()
{
post();
var hdsn = $('#hdsn').val();
var hdsn2 = $('#hdsn2').val();
var tipe = $('#tipe').val();
	$.ajax({
		url	: 'fiture/tools1().php',
		data: {hdsn: hdsn,hdsn2: hdsn2,tipe: tipe},
		type	: 'POST',
		dataType: 'html',
		success	: function(result){
hasil();
	$("#result").html(result);
	}
	});
}
</script>
