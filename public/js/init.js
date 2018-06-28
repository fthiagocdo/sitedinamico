$(document).ready(function(){
    $(".button-collapse").sideNav();
    $('.slider').slider({full_width:true});
    $('select').material_select();
    Materialize.toast($('.msg-text').val(), 5000, 'rounded '+$('.msg-class').val()); 
    $('.toast').click(function() {
		Materialize.Toast.removeAll();
	});
  });

$(document).load(function(){
    Materialize.toast($('.msg-text').val(), 5000, 'rounded '+$('.msg-class').val()); 
    $('.toast').click(function() {
		Materialize.Toast.removeAll();
	});
  });

function sliderPrev(){
	$('.slider').slider('pause');
	$('.slider').slider('prev');
}

function sliderNext(){
	$('.slider').slider('pause');
	$('.slider').slider('next');
}