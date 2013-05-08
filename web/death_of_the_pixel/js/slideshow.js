// Note, this code requires jQuery (written and tested against v1.9.1)


/*
 Define objects
*/

// Slides
function Slide( domObject ){
	this.domObject = domObject; // The DOM object that contains this slide's content
	console.log("Creating slide from " + domObject.nodeName );
}

Slide.prototype.isCurrent = function(){
	// Returns true if this is the current slide
	return $( this.domObject ).hasClass( "current" );
}

Slide.prototype.removeCurrentStatus = function(){
	$( this.domObject ).removeClass( "current" );
}

Slide.prototype.setCurrentStatus = function(){
	$( this.domObject ).addClass( "current" );
}

Slide.prototype.slideForwards = function(){
	if( this.isCurrent() ){
		// This slide is current visible, so slide it away
		
		// create closure for callback at end of animation
		var animEnd = function( slide ){
			return function(){
				console.log("Animation finished. Removing off-screen slide.");
				slide.removeCurrentStatus();
			    slide.domObj.style.display = "none";
		    };
		};
		
		console.log("Sliding on-screen slide forward.");
		$( this.domObject ).addClass( "away-forward" ).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', animEnd( this.domObject ) ); 
	}
	else{
		// This slide is currently off-screen. Make it
		// visible and slide it in
		
		// create closure for callback at end of animation
		var animEnd = function( slide ){
			return function(){
				console.log("Finished animating new slide in forward.");
			    slide.setCurrentStatus();
		    };
		};
		
		console.log("Sliding off-screen slide forward.");
		this.domObject.style.display = "block";
		$( this.domObject ).addClass( "in-forward" ).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', animEnd( this ) );
	}
}

Slide.prototype.slideBackwards = function(){
	if( this.isCurrent() ){
		// This slide is current visible, so slide it away
		
		// create closure for callback at end of animation
		var animEnd = function( slide ){
			return function(){
				console.log("Animation finished. Removing off-screen slide.");
				slide.removeCurrentStatus();
			    slide.domObject.style.display = "none";
		    };
		};
		
		console.log("Sliding on-screen slide backward.");
		$( this.domObject ).addClass( "away-backward" ).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', animEnd( this ) ); 
	}
	else{
		// This slide is currently off-screen. Make it
		// visible and slide it in
		
		// create closure for callback at end of animation
		var animEnd = function( slide ){
			return function(){
				console.log("Finished animating new slide in backward.");
			    slide.setCurrentStatus();
		    };
		};
		
		console.log("Sliding off-screen slide backward.");
		this.domObject.style.display = "block";
		$( this.domObject ).addClass( "in-backward" ).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', animEnd( this ) );	
	}
}





// Presentation
function Presentation(){
	this.slides = new Array();
	this.currentSlideIndex = -1;
}

Presentation.prototype.countSlides = function(){
	return this.slides.length;
}

Presentation.prototype.currentSlide = function(){
	return this.slides[ this.currentSlideIndex ];
}

Presentation.prototype.appendSlide = function( slide ){
	var newLength = this.slides.push( slide );
	if( slide.isCurrent() ){
		// was there an earlier current slide?
		if( this.currentSlideIndex > -1 ){
			// Yes, remove it's "current" class
			console.log("Removing current status from slide " + this.currentSlideIndex);
			this.currentSlide().removeCurrentStatus();
		}
	
		this.currentSlideIndex = newLength - 1;
		console.log("Current slide is now at index: " + this.currentSlideIndex );
	}
}


Presentation.prototype.nextSlide = function(){
	var nextSlide = null;
	// Check that there is a next slide
	if( this.currentSlideIndex < (this.countSlides() - 1) ){
		nextSlide = this.slides[ this.currentSlideIndex + 1 ];
	}
	return nextSlide;
}

Presentation.prototype.prevSlide = function(){
	var prevSlide = null;
	// Check that there is a previous slide
	if( this.currentSlideIndex > 0 ){
		prevSlide = this.slides[ this.currentSlideIndex - 1 ];
	}
	return prevSlide;
}

Presentation.prototype.goToNextSlide = function(){
	var nextSlide;
	if( (nextSlide = this.nextSlide()) !== null ){
		// There is a next slide
		this.currentSlide().slideForwards();
		nextSlide.slideForwards();
		console.log("Switched to next slide.");
		this.currentSlideIndex++;
	}
	else{
		console.log("No next slide.");
	}
}

Presentation.prototype.goToPrevSlide = function(){
	var prevSlide
	if( (prevSlide = this.prevSlide()) !== null ){
		// There is a previous slide
		prevSlide.slideBackwards();
		this.currentSlide().slideBackwards();
		console.log("Switched to previous slide.");
		this.currentSlideIndex--;
	}
	else{
		console.log("No previous slide.");
	}
}

Presentation.prototype.isRunning = function(){
	return $( "body" ).hasClass( "presentation" );
}

Presentation.prototype.begin = function(){
	if( ! this.isRunning() ){
		$( "body" ).addClass( "presentation" );
		console.log("Presentation started.");
	}
	else{
		console.log("Presentation is already running. Not starting.");
	}
}

Presentation.prototype.end = function(){
	if( this.isRunning() ){
		$( "body" ).removeClass( "presentation" );
		console.log("Presentation ended.");
	}
	else{
		console.log("Presentation is not running. Not ending.");
	}
}

Presentation.prototype.toggle = function(){
	$( "body" ).toggleClass( "presentation" );
	console.log("Toggled presentation mode.");
}



// Begin execution when document has loaded...
$( document ).ready(function() {

	// create presentation object
	var prez = new Presentation();


	// add all slides to presentation
	$( ".slide" ).each( function( index ){
		prez.appendSlide( new Slide( this ) );
	} );


	$( document ).keydown( function( event ){
		
		switch( event.keyCode ){
		
			case 80: // P key
				prez.toggle();
				break;
		
			case 37: // left arrow
				//prez.goToPrevSlide();
				break;
				
			case 39: // right arrow
				//prez.goToNextSlide();
				break;
			
		}
		
	});


});