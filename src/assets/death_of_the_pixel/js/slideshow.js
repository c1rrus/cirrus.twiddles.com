// Note, this code requires jQuery (written and tested against v1.9.1)


/*
 Define objects
*/

// Slides
function Slide( domObject ){
	this.domObject = domObject; // The DOM object that contains this slide's content
	this.domObject.slideRef = this; // Add reference to self to DOM Object
	console.log("Creating slide from " + domObject.nodeName );
}

Slide.prototype.animInEnd = function(){
	// Called when slide in animations end
	// NOTE that "this" will refer to the DOM element, not the slide
	console.log("Finished animating new slide in.");
	this.slideRef.clearAnimationClasses();
	$( this ).unbind( 'animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', this.slideRef.animInEnd );
}

Slide.prototype.animOutEnd = function(){
	// Called when slide out animations end
	// NOTE that "this" will refer to the DOM element, not the slide
	console.log("Finished animating old slide out.");
	this.slideRef.clearVisibility(); // make display none
	this.slideRef.clearAnimationClasses();
	$( this ).unbind( 'animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', this.slideRef.animOutEnd );
}

Slide.prototype.clearAnimationClasses = function(){
	$( this.domObject ).removeClass( "away-forward in-forward away-backward in-backward" );
}

Slide.prototype.makeNotCurrent = function(){
	$( this.domObject ).removeClass( "current" );
}

Slide.prototype.clearVisibility = function(){
	$( this.domObject ).removeClass( "visible" );
}

Slide.prototype.makeCurrent = function(){
	$( this.domObject ).addClass( "current" );
}

Slide.prototype.enableVisibility = function(){
	$( this.domObject ).addClass( "visible" );
}

Slide.prototype.slideForwards = function( isCurrent ){
	if( isCurrent ){
		// This slide is current visible, so slide it away		
		console.log("Sliding on-screen slide forward.");
		$( this.domObject ).addClass( "away-forward" ).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', this.animOutEnd );
		this.makeNotCurrent();
	}
	else{
		// This slide is currently off-screen. Make it
		// visible and slide it in
		console.log("Sliding off-screen slide forward.");
		this.enableVisibility();
		$( this.domObject ).addClass( "in-forward" ).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', this.animInEnd );
		this.makeCurrent();
	}
}

Slide.prototype.slideBackwards = function( isCurrent ){
	if( isCurrent ){
		// This slide is current visible, so slide it away
		console.log("Sliding on-screen slide backward.");
		$( this.domObject ).addClass( "away-backward" ).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', this.animOutEnd );
		this.makeNotCurrent();
	}
	else{
		// This slide is currently off-screen. Make it
		// visible and slide it in
		console.log("Sliding off-screen slide backward.");
		this.enableVisibility();
		$( this.domObject ).addClass( "in-backward" ).bind('animationend webkitAnimationEnd MSAnimationEnd oAnimationEnd', this.animInEnd );	
		this.makeCurrent();
	}
}





// Presentation
function Presentation(){
	this.slides = new Array();
	this.currentSlideIndex = 0;
}

Presentation.prototype.countSlides = function(){
	return this.slides.length;
}

Presentation.prototype.currentSlide = function(){
	return this.slides[ this.currentSlideIndex ];
}

Presentation.prototype.appendSlide = function( slide ){
	var newLength = this.slides.push( slide );
	if( newLength == 1 ){
		console.log("Making first slide visible");
		this.slides[0].enableVisibility();
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
	if( ! this.isRunning() ){
		console.log( "Presentation is not running." );
		return;
	}
	
	var nextSlide;
	if( (nextSlide = this.nextSlide()) !== null ){
		console.log("----");
		// There is a next slide
		this.currentSlide().slideForwards( true );
		nextSlide.slideForwards( false );
		console.log("Switched to next slide.");
		this.currentSlideIndex++;
	}
	else{
		console.log("No next slide.");
	}
}

Presentation.prototype.goToPrevSlide = function(){
	if( ! this.isRunning() ){
		console.log( "Presentation is not running." );
		return;
	}
	
	var prevSlide
	if( (prevSlide = this.prevSlide()) !== null ){
		console.log("----");
		// There is a previous slide
		prevSlide.slideBackwards( false );
		this.currentSlide().slideBackwards( true );
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
	window.prez = prez;

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
				prez.goToPrevSlide();
				break;
				
			case 39: // right arrow
				prez.goToNextSlide();
				break;
			
		}
		
	});


});