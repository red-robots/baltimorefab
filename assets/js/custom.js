"use strict";

(function () {
  tinymce.PluginManager.add('checklistbutton', function (editor, url) {
    //console.log(url);
    var parts = url.split('assets');
    var themeURL = parts[0]; // Add Button to Visual Editor Toolbar
    //   editor.addButton('custom_class', {
    //       title: 'Checklist',
    //       cmd: 'custom_class',
    //       image: themeURL + 'assets/img/checklist.png',
    //   });
    // Add Command when Button Clicked

    editor.addCommand('custom_class', function () {
      //alert('Button clicked!');
      // var selected_text = editor.selection.getContent({
      //   'format': 'html'
      // });
      var selected_text = editor.selection.getContent();

      if (selected_text.length === 0) {
        alert('Please select some text.');
        return;
      }

      var open_column = '<div class="ChecklistWrap">';
      var close_column = '</div>';
      var return_text = '';
      return_text = open_column + selected_text + close_column;
      editor.execCommand('mceReplaceContent', false, return_text);
      return; //var selected_text = editor.selection.getContent();
      // var selected_text = editor.selection.getContent({
      //   'format': 'html'
      // });
      // var return_text = '';
      // return_text = '<span class="dropcap">' + selected_text + '</span>';
      // editor.execCommand('mceInsertContent', 0, return_text);
    });
  });
  tinymce.PluginManager.add('ctabutton', function (editor, url) {
    //console.log(url);
    var parts = url.split('assets');
    var themeURL = parts[0]; // Add Button to Visual Editor Toolbar

    editor.addButton('edbutton1', {
      title: 'Button Dark Orange',
      cmd: 'edbutton1',
      image: themeURL + 'assets/img/tinymce-button.png'
    }); // Add Command when Button Clicked

    editor.addCommand('edbutton1', function () {
      var selected_text = editor.selection.getContent();

      if (selected_text.length === 0) {
        alert('Please select some text.');
        return;
      }

      var open_column = '<span class="custom-button-element blue"><a data-mce-href="#" href="#"  data-mce-selected="inline-boundary" class="button-element button">';
      var close_column = '</a></span>';
      var return_text = '';
      return_text = open_column + selected_text + close_column;
      editor.execCommand('mceReplaceContent', false, return_text);
      return;
    });
  });
})();
"use strict";

/**
 *  Custom jQuery Scripts
 *  Developed by: Lisa DeBona
 *  Date Modified: 03.31.2026
 */
jQuery(document).ready(function ($) {
  if ($('.popup-image').length) {
    $('.popup-image').fancybox({
      //buttons : ['close','thumbs','fullScreen'],
      buttons: ['fullScreen', 'close'],
      protect: true,
      loop: false,
      hash: false,
      animationEffect: 'fade'
    });
  } // $('.grid').masonry({
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


  var grid = document.querySelector('.masonry-images'); // Initialize Masonry ONLY after images have loaded

  imagesLoaded(grid, function () {
    var msnry = new Masonry(grid, {
      itemSelector: '.masonry-item',
      columnWidth: '.masonry-item',
      percentPosition: true,
      gutter: 0 // Space between items

    });
  });
  var swiperElements = document.querySelectorAll('.swiper');

  if (swiperElements.length) {
    // Loop through each element found
    swiperElements.forEach(function (el) {
      new Swiper(el, {
        speed: 400,
        slidesPerView: 1,
        effect: 'fade',
        loop: true,
        grabCursor: true,
        allowTouchMove: true,
        autoplay: {
          delay: 5000,
          // Time in ms between slides (3 seconds)
          disableOnInteraction: false // Keeps sliding after user interacts

        },
        navigation: {
          nextEl: el.querySelector('.swiper-button-next'),
          prevEl: el.querySelector('.swiper-button-prev')
        },
        pagination: {
          el: el.querySelector('.swiper-pagination'),
          clickable: true
        }
      });
    });
  } //OPEN menu toggle
  // $(document).on('click', '.menu-toggle', function(e){
  // 	e.preventDefault();
  // 	let isExpanded = $(this).attr('aria-expanded') === 'true';
  // 	$(this).attr('aria-expanded', !isExpanded);
  // 	let ariaControls = $(this).attr('aria-controls');
  // 	if( $(ariaControls).length ) {
  // 		if(isExpanded==false) {
  // 			$(ariaControls).addClass('open');
  // 		} else {
  // 			$(ariaControls).addClass('closed');
  // 			setTimeout(function(){
  // 				$(ariaControls).removeClass('closed open');
  // 			},600);
  // 		}
  // 	}
  // });
  //CLOSE menu toggle
  // $(document).on('click', '.closeMenuToggle', function(e){
  // 	e.preventDefault();
  // 	$('#primary-navigation').addClass('closed');
  // 	$('.menu-toggle').attr('aria-expanded','false');
  // 	setTimeout(function(){
  // 		$('#primary-navigation').removeClass('open closed');
  // 	},800);
  // });

  /**
   *  Custom jQuery Scripts
   *  Developed by: Mindy Amante
   *  Date Modified: 06.02.2026
   */
  // Preloader - WOW js


  Pace.on("done", function () {
    $("#preloader").addClass("load_coplate");
    $(".product_name").addClass("load_coplate");
  }); // Preloader - END
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

  navbarFixed(); // Fixed Navbar - END
  // Mobile Menu

  $(".menu_btn").on("click", function (e) {
    e.preventDefault();
    $("body").removeClass("menu-is-closed").addClass("menu-is-opened");
  });
  $(".close_btn, .body_capture").on("click", function () {
    $("body").removeClass("menu-is-opened").addClass("menu-is-closed");
  });

  function wd_scroll() {
    if ($(".wd_scroll").length) {
      $(window).on("load", function () {
        $(".wd_scroll").mCustomScrollbar({
          theme: "dark"
        });
      });
    }
  }

  wd_scroll(); // .wd_scroll sub-menu

  var dropToggle = $(".mb_menu > li").has("ul").children("a");
  dropToggle.on("click", function () {
    dropToggle.not(this).closest("li").find("ul").slideUp(300);
    $(this).closest("li").children("ul").slideToggle(300);
    return false;
  }); // Mobile Menu - END
  // Back to Top Button

  function backTop() {
    var back_top_btn = $(".go_top");
    back_top_btn.on("click", function (e) {
      e.preventDefault();
      $("html, body").animate({
        scrollTop: 0
      }, "300");
    });
  }

  backTop(); // Back to Top Button - END
  // Hero Slider - Home

  function mainSlider() {
    var sliderTimer = 10000;
    var beforeEnd = 500;
    var $imageSlider = $(".main_slider,.slider_tweenty_area");
    $imageSlider.slick({
      autoplay: true,
      autoplaySpeed: sliderTimer,
      speed: 5000,
      dots: false,
      fade: true,
      prevArrow: ".slider_left_arrow",
      nextArrow: ".slider_right_arrow",
      adaptiveHeight: true,
      pauseOnFocus: false,
      pauseOnHover: false
    });

    function progressBar() {
      $(".slider-progress").find(".slider_progress_bar").removeAttr("style");
      $(".slider-progress").find(".slider_progress_bar").removeClass("active");
      setTimeout(function () {
        $(".slider-progress").find(".slider_progress_bar").css("transition-duration", sliderTimer / 1000 + "s").addClass("active");
      }, 100);
    }

    progressBar();
    $imageSlider.on("beforeChange", function (e, slick) {
      progressBar();
    });
    $(".main_slider,.slider_tweenty_area").on("beforeChange", function (e, slick, currentSlide, nextSlide) {
      var $animatingElements = $('div.slider_item[data-slick-index="' + nextSlide + '"]').find("[data-animation]");
      doAnimations($animatingElements);
    });

    function doAnimations(elements) {
      var animationEndEvents = "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend";
      elements.each(function () {
        var $this = $(this);
        var $animationDelay = $this.data("delay");
        var $animationType = "animated " + $this.data("animation");
        $this.css({
          "animation-delay": $animationDelay,
          "-webkit-animation-delay": $animationDelay
        });
        $this.addClass($animationType).one(animationEndEvents, function () {
          $this.removeClass($animationType);
        });
      });
    }
  }

  mainSlider(); // Hero slider Home
});