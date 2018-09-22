$(function(){if($('.slides').length) {		
		
			$('.slides')._TMS({
				prevBu:'.button_prev',
				nextBu:'.button_next',
				duration:800,
				easing:false,
				preset:'simpleFade',
				pagination:false,//'.pagination',true,'<ul></ul>'
				pagNums:false,
				slideshow:6000,
				numStatus:false,
				banners:true,// fromLeft, fromRight, fromTop, fromBottom
				banners:'fade',// fromLeft, fromRight, fromTop, fromBottom
				waitBannerAnimation:false,
				progressBar:false
				})
				   } })