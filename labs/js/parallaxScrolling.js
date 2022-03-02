jQuery(document).ready(function($){

	/**** Parallax Scrolling Effect ****/
	jQuery.fn.applyParallaxScrolling = function(params){

		// read value
		var scrollSpeed = params['scrollSpeed'];
		// read optional value
		var isCenter = 'center' in params ? params['center'] : false;
		var responsive = 'responsive' in params ? params['responsive'] : false;
		var setFrameHeight = 'frameHeight' in params ? params['frameHeight'] : false;
		var debug = 'debug' in params ? params['debug'] : false;

		var selector = $(this);
		var image = selector.children('img');

		// realtime observation
		if(debug){
			var html = '<span class="f_size"></span> <span class="i_size"></span>';
			html += '<span class="viewable_area"></span>';
			selector.append(html);
			selector.addClass('debugging');
		}
		

		// check if scrollSpeed in range from 0 to 1
		if(scrollSpeed >= 0 && scrollSpeed <= 1){
			if( scrollSpeed == 0 ){

				console.log('Apply default parallax.');
				selector.addClass('parallaxScrollingDefault');
				image.addClass('parallaxObjectDefault');
				
			} else {

				// get natural size of image
				var img = new Image();
				img.src = image.attr('src');
				var i_nat_size = { 'w':img.naturalWidth, 'h':img.naturalHeight }

				// apply CSS, initial beginning position for background
				selector.addClass('parallaxScrolling');
				image.addClass('parallaxObject');

				$(window).on('load resize', function(){
					// if has set frameHeight
					if(setFrameHeight) {
						selector.css('height', setFrameHeight + 'px');
					}

					// if has responsive setting
					for(var i=0; i<responsive.length; i++){
						var breakpoint = responsive[i]['breakpoint'];
						var frameHeight = responsive[i]['frameHeight'];
						var win_w = $(window).width();

						if( i==0 && win_w > breakpoint ) { 
							var defaultFrameHeight = setFrameHeight ? setFrameHeight : '';
							selector.css('height', defaultFrameHeight + 'px'); 
							break; 
						}
						else if( win_w <= breakpoint ){
							selector.css('height', frameHeight + 'px');
						}
					}

					var f_h = selector.height(); // frame height
					var f_w = selector.width(); // frame width
					var i_h = image.height(); // image height

					// fitting image to cover the frame
					var i_min_h = (f_w * i_nat_size['h']) / i_nat_size['w'];
					image.css('height', i_min_h + 'px');
					i_h = i_min_h;

					// stretch image to cover the frame when scrolling
					var f_top = selector.offset().top; // distance from frame to viewport top
					var max_scroll = f_top + f_h; // the frame will be slide out off viewport when scroll to this
					var i_top = scrollSpeed * max_scroll; // the height of image that always be hidden out of the frame
					var i_needed_h = i_h + i_top; //console.log('i_top: '+i_top+' -- '+i_nat_size['h']);

					// if isCenter
					if(isCenter) { i_needed_h += f_h/2; }	

					image.css('height', i_needed_h + 'px');

					// calculate the image's viewable area
					var i_size = { 'w':image.width(), 'h':image.height(), 'acreage':image.width()*image.height() };
					var f_size = { 'w':selector.width(), 'h':selector.height(), 'acreage':selector.width()*selector.height() };
					var viewable_area = f_size['acreage']*100/i_size['acreage'];
					console.table({
						'Image size': i_size['w'].toFixed(0) + ' x ' + i_size['h'].toFixed(0),
						'Frame size': f_size['w'].toFixed(0) + ' x ' + f_size['h'].toFixed(0),
						'Viewable area': viewable_area.toFixed(2) + '%'
					});

					// debug
					if(debug){
						$('.f_size').html('Frame size: ' + f_size['w'].toFixed(0) + ' x ' + f_size['h'].toFixed(0));
						$('.i_size').html('Image size: ' + i_size['w'].toFixed(0) + ' x ' + i_size['h'].toFixed(0));
						$('.viewable_area').html('Viewable area: ' + viewable_area.toFixed(2) + '%');
					}
					
				});

				$(window).on("load resize scroll",function(){					
					// processing
					var windowScrollTop = $(window).scrollTop();
					var newPosition = -1 * windowScrollTop * scrollSpeed; //console.log(windowScrollTop+'px - '+newPosition+'px');

					// if isCenter
					if(isCenter) { newPosition += -1 * (image.height()-selector.height())/2; }

					// set new position
			        image.css('top', newPosition + 'px');

			    });
			}

		} else {
			console.log('Error: scrollSpeed value should be in range from 0 to 1');
		}
	}


	/* Usage */
	/*
	scrollSpeed: required, in range from 0 to 1
	center: optional, position background center frame
	frameHeight: optional, set frame's height
	responsive: optional, set responsive for frame's height
	debug: optional, show frame size, image size, viewable area on front-end
	*/
	$('.banner').applyParallaxScrolling({
		scrollSpeed: 0.2
		//center: true,
		//frameHeight: 500,
		//responsive: [ { breakpoint:960, frameHeight:300 }, { breakpoint:768, frameHeight:200 } ]
		//debug: true
	});

});