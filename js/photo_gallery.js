(function() {
	$(window).load(function() {
		var frame = $('#photo-gallery');
		var pgWrapper = $('#pg-wrapper');
		var pgItem = $('.pg-item');

		var frameSize = parseInt(frame.css('width').replace(/[^-\d\.]/g, ''))
		var posLeft = parseInt(pgWrapper.css('left').replace(/[^-\d\.]/g, ''));
		var move = parseInt($(pgItem[0]).css('width').replace(/[^-\d\.]/g, '')) + 2;

		$('.pg-control#left').click(function() {
			if(posLeft <= frameSize) {
				posLeft += move;
				//pgWrapper.css('left', posLeft + 'px');
				pgWrapper.animate({
						left: posLeft + 'px'
				}, 600, function() {
					// Animation complete.
					});
			}
		});

		$('.pg-control#right').click(function() {
			if(posLeft >= 0) {
				posLeft -= move;
				//pgWrapper.css('left', posLeft + 'px');
				pgWrapper.animate({
						left: posLeft + 'px'
				}, 600, function() {
					// Animation complete.
					});
			}
		});

		var pgOverlay = $('#pg-overlay');

		pgItem.click(function() {
			var imgSrc = $(this).find('img').attr('src');
			$(pgOverlay).find('img').attr('src', imgSrc);
			pgOverlay.css('zIndex', '1');
			pgOverlay.animate({
						opacity: 1
			}, 500, function() {
					// Animation complete.
				});
		});

		pgOverlay.click(function(e) {
			if(e.target == this) {
				$(this).animate({
  						opacity: 0
				}, 500, function() {
					$(this).css('zIndex', '-1');
  				});
			}
		});
	});

})();