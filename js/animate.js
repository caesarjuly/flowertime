		$(document).ready(function(){
			$('.quan').hover(
			function(){
			$(this).animate({
				width: '50',
				left: '75',
				top: '24'
			},200);
			},
			function(){
			$(this).animate({
				width: '14',
				top: '45',
				left: '94'
			},200);
			});

			$('.logo').hover(
			function(){
			$('.bg_logo').animate({
				width: '200',
				left: '360',
				top: '-11'
			},200);
			},
			function(){
			$('.bg_logo').animate({
				width: '150',
				left: '385',
				top: '20'
			},200);
			});

			$('.quan3').hover(
			function(){
			$(this).animate({
				width: '30',
				left: '735',
				top: '51'
			},200);
			},
			function(){
			$(this).animate({
				width: '10',
				left: '745',
				top: '62'
			},200);
			});

			$('.outernav').hover(
			function(){
			$(this).find('ul').slideDown('fast');
			},
			function(){
			$(this).find('ul').slideUp('fast');
			});


		});
