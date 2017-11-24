/*dropdown select preset*/
$("#Preset").on('change',function(e){
	var isiPreset = $("#Preset option:selected").text();
	$("#form-setting #PresetName").val(isiPreset);
	$.ajax({
		url: _opts.urlGetPreset,
		type: 'post',
		dataType:'json',
		data: {'PresetName' : this.value},
		success: function(data) {
			// console.log(data);
			var PresetValue = data;

			$("#form-setting [name='UserAddress[recipient_name]']").val(PresetValue["recipient_name"]);
			$("#form-setting [name='UserAddress[address]']").val(PresetValue["address"]);
			$("#form-setting [name='UserAddress[province_id]']").val(PresetValue["province_id"]);
			$("#form-setting [name='UserAddress[city_id]']").val(PresetValue["city_id"])
			$("#form-setting [name='UserAddress[districts_id]']").val(PresetValue["districts_id"])
			$("#form-setting [name='UserAddress[phone_number]']").val(PresetValue["phone_number"])
			$("#form-setting [name='UserAddress[is_default]']").val(PresetValue["is_default"]);
		}  
	});		
})