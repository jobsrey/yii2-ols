/*dropdown select preset*/
$("#Preset").on('change',function(e){
	var isiPreset = $("#Preset option:selected").text();
	$("#form-setting #PresetName").val(isiPreset);
	$.ajax({
		url: _opts.urlGetPreset+'?_='+Math.random(),
		type: 'post',
		dataType:'json',
		data: {'PresetName' : this.value},
		success: function(data) {
			var PresetValue = data.data;
			var PresetLoc 	= data.detailLoc;

			console.log(PresetLoc);

			$("#form-setting [name='UserAddress[recipient_name]']").val(PresetValue["recipient_name"]);
			$("#form-setting [name='UserAddress[address]']").val(PresetValue["address"]);
			$("#form-setting [name='UserAddress[province_id]']").val(PresetLoc["province"]);
			$("#form-setting [name='UserAddress[city_id]']").val(PresetLoc["city_name"])
			$("#form-setting [name='UserAddress[districts_id]']").val(PresetValue["districts_id"])
			$("#form-setting [name='UserAddress[phone_number]']").val(PresetValue["phone_number"])
			$("#form-setting [name='UserAddress[is_default]']").val(PresetValue["is_default"]);
		}  
	});		
})