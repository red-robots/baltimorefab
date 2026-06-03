/**
 *  Custom jQuery Scripts
 *  Developed by: Lisa DeBona
 *  Date Modified: 03.31.2026
 */
jQuery(document).ready(function($) {

	if( $('.popup-image').length ) {
		$('.popup-image').fancybox({
			//buttons : ['close','thumbs','fullScreen'],
			buttons : ['fullScreen','close'],
			protect: true,
			loop: false,
			hash : false,
			animationEffect: 'fade'
		});
	}

	// $('.grid').masonry({
	// 	itemSelector: '.grid-item',
	// 	columnWidth: 200
	// });

	// init Masonry
	// var $grid = $('.grid').masonry({
	// 	itemSelector: '.grid-item',
	// 	percentPosition: true,
	// 	columnWidth: '.grid-sizer'
	// });
	// // layout Masonry after each image loads
	// $grid.imagesLoaded().progress( function() {
	// 	$grid.masonry();
	// });

	// Select the grid element
	var grid = document.querySelector('.masonry-images');
	// Initialize Masonry ONLY after images have loaded
	imagesLoaded(grid, function() {
		var msnry = new Masonry(grid, {
			itemSelector: '.masonry-item',
			columnWidth: '.masonry-item',
			percentPosition: true,
			gutter: 0 // Space between items
		});
	});

  const swiperElements = document.querySelectorAll('.swiper');
  if(swiperElements.length) {
    // Loop through each element found
    swiperElements.forEach((el) => {
      new Swiper(el, {
        speed: 400,
        slidesPerView: 1,
        effect: 'fade',
        loop: true,
				grabCursor: true,
				allowTouchMove: true,
        autoplay: {
          delay: 5000, // Time in ms between slides (3 seconds)
          disableOnInteraction: false, // Keeps sliding after user interacts
        },
        navigation: {
          nextEl: el.querySelector('.swiper-button-next'),
          prevEl: el.querySelector('.swiper-button-prev'),
        },
        pagination: {
          el: el.querySelector('.swiper-pagination'),
          clickable: true,
        },
      });
    });
  }

	//OPEN menu toggle
	$(document).on('click', '.menu-toggle', function(e){
		e.preventDefault();
		let isExpanded = $(this).attr('aria-expanded') === 'true';
		$(this).attr('aria-expanded', !isExpanded);
		let ariaControls = $(this).attr('aria-controls');
		if( $(ariaControls).length ) {
			if(isExpanded==false) {
				$(ariaControls).addClass('open');
			} else {
				$(ariaControls).addClass('closed');
				setTimeout(function(){
					$(ariaControls).removeClass('closed open');
				},600);
			}
		}
	});

	//CLOSE menu toggle
	$(document).on('click', '.closeMenuToggle', function(e){
		e.preventDefault();
		$('#primary-navigation').addClass('closed');
		$('.menu-toggle').attr('aria-expanded','false');
		setTimeout(function(){
			$('#primary-navigation').removeClass('open closed');
		},800);
	});

	/**
	 *  Custom jQuery Scripts
	 *  Developed by: Mindy Amante
	 *  Date Modified: 06.02.2026
	 */
	// Preloader - WOW js
	Pace.on("done", function () {
		$("#preloader").addClass("load_coplate");
		$(".product_name").addClass("load_coplate");
	});
	// Preloader - END

	// Fixed Navbar
	var nav_offset_top = $("header").height() + 100;
	function navbarFixed() {
		if ($("header").length) {
			$(window).scroll(function () {
				var scroll = $(window).scrollTop();
				if (scroll >= nav_offset_top) {
					$("header").addClass("navbar_fixed");
				} else {
					$("header").removeClass("navbar_fixed");
				}
			});
		}
	}
	navbarFixed();
	// Fixed Navbar - END

	// Back to Top Button
	function backTop() {
		var back_top_btn = $(".go_top");
		back_top_btn.on("click", function (e) {
			e.preventDefault();
			$("html, body").animate({ scrollTop: 0 }, "300");
		});
	}
	backTop();
	// Back to Top Button - END

});



