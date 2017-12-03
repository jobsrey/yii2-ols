function updateCart(value,id_data){

	console.log(value);
	var csrfToken = $('meta[name="csrf-token"]').attr("content");
	/*$.ajax({
	         url: 'request',
	         type: 'post',
	         dataType: 'json',
	         data: {param1: param1, _csrf : csrfToken},
	});*/

	$.ajax({
        url: _opts.urlUpdateCart,
        data: {
            cart: value,
            cart_id : id_data,
            _csrf : csrfToken
        },
        type: "POST",
        dataType: "JSON",
        success: function (data) {
            /*var result = $('<div />').append(data).find('#showresults').html();
            $('#showresults').html(result);*/
        },
        error: function (xhr, status) {
            alert("Sorry, there was a problem!");
        },
        complete: function (xhr, status) {
            //$('#showresults').slideDown('slow')
        }
    });
}