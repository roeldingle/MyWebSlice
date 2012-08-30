$(function(){
	//alert(3);
	$('#page_id_0').addClass('active');
	
	$('.carousel').carousel({
		interval: false
	});
	
	//prev
	$(".left").click(function(){
		$('.carousel').carousel('next');
	});
	
	$(".right").click(function(){
		$('.carousel').carousel('prev');
	});
	
	$('#resume_btn').mouseover(function(){
		$(this).addClass('animated swing');
	});
	
	$('#resume_btn').mouseout(function(){
		$(this).removeClass('animated swing');
	});
	
	
	
	

});

var Home = {

	page: function(page){
		$('.nav li').removeClass('active');
		$('#page_id_'+page).addClass('active');
		$('.carousel').carousel(page);
	
	}


}

