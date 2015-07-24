$(function(){
	var i = 0,
		t,
		tt,
		ttt,
		tttt,
		items = [
			'HTML',
			'design',
			'Python',
			'UX',
			'Javascript',
			'fluidity',
			'LESS',
			'WordPress',
			'PHP',
			'creativity',
			'SQL',
			'intricacy',
			'SCSS',
			'Markdown',
			'Bootstrap'
		];
	
	ticker();
	
	function ticker() {
		$('#ticker').children('b').html(items[i]);
		$('#ticker').css({
			'width': $('#ticker').children('b').width() + 'px',
		});
		t = setTimeout(function(){
			$('#ticker').removeClass('animate-out');
			i = (i + 1) % items.length;
			
			tt = setTimeout(function(){
				$('#ticker').addClass('animate-out');
				
				ttt = setTimeout(function(){
					ticker();
				}, 700);
			}, 3600);
		}, 600);
	}
	
	var left = $('#title').children('h1').offset().left + $('#title').children('h1').width(),
		bottom = $('#title').children('h1').offset().top;
		
	$('#subtitle').css({
		'left': left - 50 + 'px',
		'top': bottom - 50 + 'px',
	});
	
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
});