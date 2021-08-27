jQuery(document).ready(function($) {
    $('.product').click( function() {
        $('.product__title').addClass('active');
    });
//Owl carousel
$('.slider').slick({
    arrows: false,
    infinite: true,
    dots: true,
    autoplay:true,
    autoplaySpeed :6000,
    speed: 300,
    slidesToShow: 1,

   });
$('.pro-img').slick({
        arrows: true,
        infinite: true,
        dots: false,
        speed: 300,
        slidesToShow: 1,
        adaptiveHeight: true,
        prevArrow: '<div class="back-to-style"><ion-icon name="chevron-back-outline"></ion-icon></div>',
        nextArrow: '<div class="next-to-style"><ion-icon name="chevron-forward-outline"></ion-icon></div>'
    });
    $('.partner__all').slick({
        arrows: true,
        infinite: true,
        dots: false,
        autoplaySpeed :3000,
        speed:300,
        slidesToShow: 6,
        adaptiveHeight: true,
        prevArrow: '<div class="back-to-style"><ion-icon name="chevron-back-outline"></ion-icon></div>',
        nextArrow: '<div class="next-to-style"><ion-icon name="chevron-forward-outline"></ion-icon></div>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 6,
                    slidesToScroll:6,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                }
            },
            {
                breakpoint: 575,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            },
            {
                breakpoint: 375,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                }
            },
            
        ]
    });
    $('.blogs-all').slick({
        arrows: true,
        infinite: true,
        dots: false,
        autoplaySpeed :3000,
        speed:300,
        margin:10,
        slidesToShow: 3,
        adaptiveHeight: true,
        prevArrow: '<div class="back-to-style"><ion-icon name="chevron-back-outline"></ion-icon></div>',
        nextArrow: '<div class="next-to-style"><ion-icon name="chevron-forward-outline"></ion-icon></div>'
    });
   

});

jQuery(document).ready(function($) {
	$('.navbar').click( function () {
		$('.nav-overlay').animate({right: '0px'}, 200);
		$('.nav-overlay').css('display','block');
	});
	$('.menu-close').click( function () {
        $('.cover').removeClass('active');
		$('.nav-overlay').animate({right: '-300px'}, 200);
        $('.nav-overlay').css('display','none');
        
	});
});

jQuery(document).ready(function($){
    $('.navbar').click( function() {
        $('.cover').addClass('active');
    });
    $('.cover').click( function() {
        $('.cover').removeClass('active');
        $('.nav-overlay').animate({right: '-300px'}, 200);
        $('.nav-overlay').css('display','none');
    });

});
