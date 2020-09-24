$(document).ready(function(){
	var owl = $('.owl-carousel');

	$('.customNextBtn').click(function() {
		owl.trigger('next.owl.carousel');
	})
// Go to the previous item
$('.customPrevBtn').click(function() {
    // With optional speed parameter
    // Parameters has to be in square bracket '[]'
    owl.trigger('prev.owl.carousel', [300]);
})


owl.owlCarousel({
	loop:true,
	margin:10,
	responsiveClass:true,
	autoplay:true,
	lazyLoad:true,
	autoplayHoverPause: true,
	autoplayTimeout: 5000,
	dots:true,

	responsive:{
		0:{
			items:1,
			dots:true
		},
		600:{
			items:1,
			dots:true
		},
		1000:{
			items:1,
			dots:true,
			loop:true

		}
	}
})
});