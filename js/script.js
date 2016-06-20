$(document).ready(function(){
	$('.menu-icon1').click(function(){
		$('.show-hide-menu').slideToggle("slow");
	});
	$('.close-menu').click(function(){
		$('.show-hide-menu').slideToggle("slow");
	});
	jQuery('.carousel').carousel({
		interval: 4000
	});
});
