



$(function(){

	$(window).on('load', function() {
		$('.loading-screen').fadeOut(900);
	});


	// close all slide and fade-in elements when clicked outside it's bounds
	$(document).on('click', function(){
		$('.js-slide-toggle, .js-toggle-wrap').removeClass('js-active');
		$('.js-toggled-item').slideUp(300);
	});

	// prevent closing the element itself when clicked
	$('.js-toggle-wrap').on('click', function(ev){
		ev.preventDefault();
		ev.stopPropagation();
	});







	// toggle the slideDown of dropdown boxes
	$('.js-slide-toggle').on('click', function(ev){

		ev.preventDefault();
		ev.stopPropagation();

		var $this = $(this);

		var $wrap = $this.closest('.js-toggle-wrap');
		var $otherWraps = $('.js-toggle-wrap').not($wrap);

		var $toggledItem = $wrap.find('.js-toggled-item');

		var $others = $('.js-slide-toggle').not($this);
		var $otherToggledItems = $others.closest('.js-toggle-wrap').find('.js-toggled-item');

		if( $this.hasClass('js-active') ){
			$this.removeClass('js-active');
			$wrap.removeClass('js-active');
			$toggledItem.slideUp(300);
		}else{
			$this.addClass('js-active');
			$toggledItem.slideDown(300);
			$wrap.addClass('js-active');
			$others.removeClass('js-active');
			$otherWraps.removeClass('js-active');
			$otherToggledItems.slideUp(300);
		}


		$('.js-save').on('click', function(){
			$this.removeClass('js-active');
			$toggledItem.slideUp(300);
		});


	});


	// toggle active classes of multiselects
	$('.js-multiselect *').on('click', function(){
		var $this = $(this);
		var $parent = $this.closest('.js-multiselect');
		var $allItems = $parent.find('.js-multiselect-option');

		if($this.hasClass('js-multiselect-option')){
			$this.toggleClass('js-active');
		}

		if($this.hasClass('js-deselect')){
			$allItems.removeClass('js-active');
		}

		if($this.hasClass('js-select-all')){
			$allItems.addClass('js-active');
		}

	});



});



$(function(){

	// Change hero slide on left/right arrow click
	$('.js-change-hero-slide').on('click', function(){
		var $this = $(this);

		var $activeItem = $('.js-hero-slides').find('.js-active-slide');
		var $prevItem = $activeItem.prev('.js-hero-slide');
		var $nextItem = $activeItem.next('.js-hero-slide');
		var firstItem = $('.js-hero-slide:first');
		var lastItem = $('.js-hero-slide:last');

		if($this.hasClass('js-left')){

			$activeItem.not(firstItem).fadeOut();
			$activeItem.not(firstItem).removeClass('js-active-slide');

			$prevItem.fadeIn();
			$prevItem.addClass('js-active-slide');

		}else if($this.hasClass('js-right')){
			$activeItem.not(lastItem).fadeOut();
			$activeItem.not(lastItem).removeClass('js-active-slide');

			$nextItem.fadeIn();
			$nextItem.addClass('js-active-slide');
		}

		if(lastItem.hasClass('js-active-slide')){
			$('.js-change-hero-slide.js-right').fadeOut();
		}else{
			$('.js-change-hero-slide.js-right').fadeIn();
		}

		if(firstItem.hasClass('js-active-slide')){
			$('.js-change-hero-slide.js-left').fadeOut();
		}else{
			$('.js-change-hero-slide.js-left').fadeIn();
		}


	});


	// Change hero slide on swipe
	$('.js-hero-slide').on('mousedown', function(ev){
		ev.preventDefault();
	});

	function heroSwipe(){
		$(this).swipeDetector()
		.on('swipeLeft.sd swipeRight.sd', function(event){

			var $activeItem = $('.js-hero-slides').find('.js-active-slide');
			var $prevItem = $activeItem.prev('.js-hero-slide');
			var $nextItem = $activeItem.next('.js-hero-slide');
			var firstItem = $('.js-hero-slide:first');
			var lastItem = $('.js-hero-slide:last');

			if (event.type === 'swipeLeft') {

				$activeItem.not(lastItem).fadeOut();
				$activeItem.not(lastItem).removeClass('js-active-slide');

				$nextItem.fadeIn();
				$nextItem.addClass('js-active-slide');

			} else if (event.type === 'swipeRight') {

				$activeItem.not(firstItem).fadeOut();
				$activeItem.not(firstItem).removeClass('js-active-slide');

				$prevItem.fadeIn();
				$prevItem.addClass('js-active-slide');
			}

			if(lastItem.hasClass('js-active-slide')){
				$('.js-change-hero-slide.js-right').fadeOut();
			}else{
				$('.js-change-hero-slide.js-right').fadeIn();
			}

			if(firstItem.hasClass('js-active-slide')){
				$('.js-change-hero-slide.js-left').fadeOut();
			}else{
				$('.js-change-hero-slide.js-left').fadeIn();
			}


		});
	}


	$('.js-hero-slide').each(heroSwipe);



});



// Logic for moving the slider boxes and hero slider
$(function(){

	// Code for changing the active hero area slide when thumbnails are clicked
	$('.js-hero-thumbnail').on('click', function(ev){
		ev.preventDefault();

		var $this = $(this);
		var thisTitle = $this.attr('title');
		var $others = $('.js-hero-thumbnail').not($this);

		var $heroSlides = $this.closest('.js-hero-slides');
		var $matchingSlide = $heroSlides.find('#' + thisTitle);

		var $activeSlide = $heroSlides.find('.js-active-slide');


		if( $this.hasClass('js-active')){

		}else{
			$this.addClass('js-active');
			$others.removeClass('js-active');

			$activeSlide.fadeOut();
			$activeSlide.removeClass('js-active-slide');

			$matchingSlide.fadeIn();
			$matchingSlide.addClass('js-active-slide');
		}

	});

	var moveIncrement = $('.js-slider').find('.js-slider-item').not('.js-active').outerWidth();
	var winW = $(window).outerWidth();


	// Code for moving slider elements when the arrows are clicked
	function sliderArrowClick(){
		var $this = $(this);
		var $slider = $this.closest('.js-slider');
		var $slidingBlock = $slider.find('.js-sliding-block');
		var $sliderElement = $slider.find('.js-slider-item');
		var $leftArrow = $slider.find('.js-left');
		var $rightArrow = $slider.find('.js-right');

		var itemCount = $sliderElement.length;
		var totalWidth = itemCount * moveIncrement;

		if( totalWidth >= winW){

			$rightArrow.addClass('js-visible');

			$this.on('click', function(ev){

				if($this.hasClass('js-left')){

					if( $slidingBlock.is(":animated") ) {
						clearInterval(1000);
					}else{
						$slidingBlock.stop(false, true).animate({'margin-left': '+='+moveIncrement}, 300);

						sliderLeft = parseInt($slidingBlock.css('margin-left').replace("px", ""));
						sliderPos = sliderLeft + moveIncrement;
					}

				}

				if($this.hasClass('js-right')){

					if( $slidingBlock.is(":animated") ) {
						clearInterval(1000);
					}else{
						$slidingBlock.stop(false, true).animate({'margin-left': '-='+moveIncrement}, 300);

						sliderLeft = parseInt($slidingBlock.css('margin-left').replace("px", ""));
						sliderPos = sliderLeft - moveIncrement;
					}

				}

				if( sliderPos <= -moveIncrement){
					$leftArrow.fadeIn();
				}else{
					$leftArrow.fadeOut();
				}

				if( sliderPos <= -totalWidth + winW){
					$rightArrow.fadeOut();
				}else{
					$rightArrow.fadeIn();
				}
			});

		}

	}
	$('.js-slider-arrow').each(sliderArrowClick);





	// Code for moving slider elements when the slider is swiped
	$('.js-slider-item').on('mousedown', function(ev){
		ev.preventDefault();
	});

	function swipeSlide(){
		$(this).swipeDetector()
		.on('swipeLeft.sd swipeRight.sd', function(event){

			var $this = $(this);
			var $slidingBlock = $this.find('.js-sliding-block');
			var $sliderElement = $this.find('.js-slider-item');
			var $leftArrow = $this.find('.js-left');
			var $rightArrow = $this.find('.js-right');

			var itemCount = $sliderElement.length;
			var totalWidth = itemCount * moveIncrement;
			var winW = $(window).outerWidth();

			console.log('totalW ' + totalWidth);

			if( totalWidth >= winW){

				if (event.type === 'swipeLeft') {

					sliderLeft = parseInt($slidingBlock.css('margin-left').replace("px", ""));
					sliderPos = sliderLeft - moveIncrement*2;

					if(sliderPos > -totalWidth){
						$slidingBlock.css('margin-left', '-='+2*moveIncrement);
						console.log(sliderPos);
						console.log('movingleft')
					}

				} else if (event.type === 'swipeRight') {

					sliderLeft = parseInt($slidingBlock.css('margin-left').replace("px", ""));
					sliderPos = sliderLeft + moveIncrement*2;

					if(sliderPos < 100){
						$slidingBlock.css('margin-left', '+='+2*moveIncrement);
						console.log('movingright')
					}

				}

				if( sliderPos <= -moveIncrement){
					$leftArrow.fadeIn();
				}else{
					$leftArrow.fadeOut();
				}

				if( sliderPos <= -totalWidth + winW){
					$rightArrow.fadeOut();
				}else{
					$rightArrow.fadeIn();
				}

			}

		});
	}
	$('.js-slider').each(swipeSlide);

});





// set appropriate height for contact person images based on their width
$(function setHeight() {

	var heroSliderHeight = $('.js-hero-slider').outerHeight();
	var $hero = $('.js-hero-height, .js-hero-content');

	$hero.css('padding-bottom', heroSliderHeight);

	var resizeDelay;
	$(window).on('load resize orientationchange', function () {
		clearTimeout(resizeDelay);
		resizeDelay = setTimeout(function () {
			setHeight();
		}, 300);
	});
});
