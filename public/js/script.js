$(document).ready(function(){
	//Возврат на ту же страницу после отправки заявки
	$("#submit").bind("click",function() {
		$('[name = url]').attr('value',location);
	});

	$('.main-slider').owlCarousel({
		items:1,
		loop:true,
		nav:true,
		navText:["<img src='images/icons/left-arrow.svg' alt='prev'>","<img src='images/icons/right-arrow.svg' alt='next'>"]
	});
	$(".phone-mask").mask("+375 (99) 999-99-99");

	baguetteBox.run('.baguetteBox');

	var product_page_slider = $(".product-page-carousel").owlCarousel({
		items: 1,
		nav:true,
		navText:["<img src='images/icons/right-arrow.png' alt='prev'>","<img src='images/icons/right-arrow.png' alt='next'>"],
		loop:false,
		dots:false,
		margin:1,
		autoplay:false,
		lazyLoad:true,
		mouseDrag:false,
		responsive:{
			0:{
				mouseDrag:true,
				nav:false
			},
			768:{
				mouseDrag:false,
				nav:true
			}
		}
	});
	var product_page_slider_thumb = $(".product-page-carousel-thumb").owlCarousel({
		items: 7,
		nav:false,
		loop:false,
		dots:false,
		margin:15,
		autoplay:false,
		mouseDrag:true
	});
	$('.product-page-carousel-thumb .owl-item').click(function() {
		var active = $(this).index();
		product_page_slider.trigger('to.owl.carousel',active);
	});


	$('.product-page-carousel-wrapper .owl-prev').click(function() {
		product_page_slider_thumb.trigger('prev.owl.carousel');
	});
	$('.product-page-carousel-wrapper .owl-next').click(function() {
		product_page_slider_thumb.trigger('next.owl.carousel');
	});

	$('.news-slider .news-wrapper').hover(function() {
		$('.news-slider .news-wrapper').removeClass('active');
		$(this).addClass('active');
		var index = $(this).index();
		$('.news-slider .new-block-wrapper').removeClass('active');
		$('.news-slider .new-block-wrapper').eq(index).addClass('active');
	});
});