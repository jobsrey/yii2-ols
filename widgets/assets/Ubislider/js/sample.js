$(document).ready(function(){
	$("#slider4").ubislider({
	    arrowsToggle: true,
	    type: "ecommerce",
	    hideArrows: true,
	    autoSlideOnLastClick: true,
	    modalOnClick: true,
	    onTopImageChange: function(){
	    	$("#imageSlider4 img").elevateZoom();
	    }
	});
})
	