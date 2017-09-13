$(function(){
	var i = 0,
		t,
		tt,
		ttt,
		tttt,
		items = [
			'HTML',
			'Python',
			'R',
			'design',
			'UX',
			'Javascript',
			'fluidity',
			'WordPress',
            'Laravel',
			'PHP',
			'creativity',
			'SQL',
			'intricacy',
			'SCSS',
			'Markdown',
			'Bootstrap',
			'JQuery',
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
});
