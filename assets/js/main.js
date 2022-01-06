(function() {

	"use strict";

	AOS.init({
		ease: 'slide',
		once: true
	});

	var slider = function(){

		var carouselRoom = document.querySelectorAll('.carousel-room');

		if ( carouselRoom.length > 0 ) {
			var carouselRoom = tns({
				container: '.carousel-room',
				items: 1,
				mode: 'carousel',
				autoplay: true,
			  animateIn: 'tns-fadeIn',
		    animateOut: 'tns-fadeOut',
				speed: 700,
				nav: true,
				controls: false,
				autoplayButtonOutput: false,
			});
		}


		var carouselSlider = document.querySelectorAll('.carousel-testimony');

		if ( carouselSlider.length > 0 ) {

			var testimonySlider = tns({
				container: '.carousel-testimony',
				items: 1,
				mode: 'carousel',
				autoplay: true,
			  animateIn: 'tns-fadeIn',
		    animateOut: 'tns-fadeOut',
				speed: 700,
				nav: true,
				gutter: 20,
				controls: false,
				autoplayButtonOutput: false,
				responsive:{
					0:{
						items: 1,
						gutter: 0
					},
					600:{
						items: 2,
						gutter: 20
					},
					1000:{
						items: 3,
						gutter: 20
					}
				}
			});

		}

	}
	slider();
	
	//COUNTER
	'use trict';
		// How long you want the animation to take, in ms
		const animationDuration = 2000;
		// Calculate how long each ‘frame’ should last if we want to update the animation 60 times per second
		const frameDuration = 1000 / 60;
		// Use that to calculate how many frames we need to complete the animation
		const totalFrames = Math.round( animationDuration / frameDuration );
		// An ease-out function that slows the count as it progresses
		const easeOutQuad = t => t * ( 2 - t );


		const numberWithCommas = n => {
			return n.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
		}

		// The animation function, which takes an Element
		const animateCountUp = el => {
			let frame = 0;
			const countTo = parseInt( el.innerHTML, 10 );
			// Start the animation running 60 times per second
			const counter = setInterval( () => {
			frame++;
			// Calculate our progress as a value between 0 and 1
			// Pass that value to our easing function to get our
			// progress on a curve
			const progress = easeOutQuad( frame / totalFrames );
			// Use the progress value to calculate the current count
			const currentCount = Math.round( countTo * progress );

			// If the current count has changed, update the element
			if ( parseInt( el.innerHTML, 10 ) !== currentCount ) {
			el.innerHTML = numberWithCommas(currentCount);
		}

		// If we’ve reached our last frame, stop the animation
		if ( frame === totalFrames ) {
			clearInterval( counter );
		}
		}, frameDuration );
		};

		// Run the animation on all elements with a class of ‘countup’
		const runAnimations = () => {
			const countupEls = document.querySelectorAll( '.countup' );
			countupEls.forEach( animateCountUp );
		};




		// In Viewed
		var elements;
		var windowHeight;

		function init() {
			elements = document.querySelectorAll('.section-counter');
			windowHeight = window.innerHeight;
		}

		function checkPosition() {
			var i;
			for (i = 0; i < elements.length; i++) {
				var element = elements[i];
				var positionFromTop = elements[i].getBoundingClientRect().top;
			if (positionFromTop - windowHeight <= 0) {
			if( !element.classList.contains('viewed') ) {
			element.classList.add('viewed');
			runAnimations();
			} else {
			if ( element.classList.contains('viewed') ) {

			}
		}

		}
		}
		}

		window.addEventListener('scroll', checkPosition);
		window.addEventListener('resize', init);

		init();
		checkPosition();

	// var counter = function() {
	// 	function countUp(elem) {
	// 		var current = elem.innerHTML;


	// 		var timeIntervalBeforeIncrement = 2000/elem.getAttribute("data-count")


	// 		var interval = setInterval(increase, timeIntervalBeforeIncrement);

	// 		function increase() {
	// 			elem.innerHTML = current++;
	// 			if (current > elem.getAttribute("data-count")) {
	// 				clearInterval(interval);
	// 			}
	// 		}

	// 	}

	// 	var span = document.querySelectorAll("[id^='count']");

	// 	var i = 0;
	// 	for (i = 0; i < span.length; i++) {
	// 		countUp(span[i]);
	// 	}
	// }

	// //COUNTER
	// var elements;
	// var windowHeight;

	// function init() {
	// 	elements = document.querySelectorAll('.ftco-about-section');
	// 	windowHeight = window.innerHeight;
	// }

	// function checkPosition() {
	// 	var i;
	// 	for (i = 0; i < elements.length; i++) {
	// 		var element = elements[i];
	// 		var positionFromTop = elements[i].getBoundingClientRect().top;
	// 		if (positionFromTop - windowHeight <= 0) {
	// 			if( !element.classList.contains('viewed') ) {
	// 				element.classList.add('viewed');
	// 				counter();	
	// 			} else {
	// 				if ( element.classList.contains('viewed') ) {

	// 				}
	// 			}
	// 			// console.log('igo');

	// 		}
	// 	}
	// }
	// window.addEventListener('scroll', checkPosition);
	// window.addEventListener('resize', init);

	// init();
	// checkPosition()


	//GLIGHTBOX
	const lightbox = GLightbox({
	  touchNavigation: true,
	  loop: true,
	  autoplayVideos: true
	});


	//DATEPICKER
	var datePicker = function() {
		const arrivalDate = document.querySelector('.arrival_date');
		const datepicker = new Datepicker(arrivalDate, {
		  // ...options
		}); 

		const departureDate = document.querySelector('.departure_date');
		const datepicker2 = new Datepicker(departureDate, {
		  // ...options
		}); 

	}
	datePicker();


})()

