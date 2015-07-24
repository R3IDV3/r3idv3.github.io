$(function(){
	rightNotShowing = true;
	$(window).scroll(function(){
		if ( isInView( $('#about-tile')[0] ) && rightNotShowing ) {
			$('#about-tile').addClass('show');
			$('#arrow-separator').addClass('show');
			rightNotShowing = false;
		}
	});
	
	$('#arrow-separator').click(function(){
		$('#about-tile.left').toggleClass('show');
		$('#arrow-separator').toggleClass('flip');
		$('#about-tile.right').toggleClass('show');
	});
	
	function isInView(element) {
		var top = element.offsetTop;
		var left = element.offsetLeft;
		var width = element.offsetWidth;
		var height = element.offsetHeight;
		
		while(element.offsetParent) {
		element = element.offsetParent;
		top += element.offsetTop;
		left += element.offsetLeft;
		}
		
		return (
		top < (window.pageYOffset + window.innerHeight) &&
		left < (window.pageXOffset + window.innerWidth) &&
		(top + height) > window.pageYOffset &&
		(left + width) > window.pageXOffset
		);
	}
	
	function isEntirelyInView(element) {
		var top = element.offsetTop;
		var left = element.offsetLeft;
		var width = element.offsetWidth;
		var height = element.offsetHeight;
		
		while(element.offsetParent) {
		element = element.offsetParent;
		top += element.offsetTop;
		left += element.offsetLeft;
		}
		
		return (
		top >= window.pageYOffset &&
		left >= window.pageXOffset &&
		(top + height) <= (window.pageYOffset + window.innerHeight) &&
		(left + width) <= (window.pageXOffset + window.innerWidth)
		);
	}
	
	$('#about-tile.left').children('h1').fitText(0.5);
	$('#about-tile.right').children('h1').fitText(0.5);
});