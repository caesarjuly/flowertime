
  $(function(){
		$("#slides").slides({
			effect: 'fade',
			fadeSpeed: 500,
	        play: 5000,
	        generatePagination: false,
	        preload: true,
	        preloadImage: '../img/loading.gif'
	      });
		$("#Gallery").slides({
			container: 'Gallery_container',
			effect: 'fade',
			fadeSpeed: 500,
	        play: 5000,
	        generatePagination: false,
	        bigTarget: true,
	        preload: true,
	        preloadImage: '../../../img/loading.gif'
		});
	});
