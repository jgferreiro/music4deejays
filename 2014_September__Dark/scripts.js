
// Executes this when the ajax finish

$( document ).ajaxComplete(function( event,request, settings ) {
  
	$('.sliderDiapos').DDSlider({

	  nextSlide: '.sliderButtonNext',
	  prevSlide: '.sliderButtonPrev',
	  selector: '.sliderSelector'

	});
	$('#songBackgroundBlur').blurjs({
	  source: '#songBackground',
	  radius: 0,
	  overlay: 'rgba(36, 36, 36, .2)'
	}); 
});


$('#open_DrowDown').click(function () {
	$('#menuDropdown').slideToggle(0); 
	return false;
});

$('#menuDropdown a').click(function () {
	$('#menuDropdown').hide(0); 
});

$('#menuDropdown').mouseleave(function () {
	$('#menuDropdown').delay(100);
	$('#menuDropdown').hide(0);
	return false;
});

$('.sectionWrap').click(function () {	
	$('#menuDropdown').delay(100);
	$('#menuDropdown').hide(0); 
	console.log("pressed");
});

if(navigator.userAgent.match(/Android/i)
  	|| navigator.userAgent.match(/webOS/i)
  	|| navigator.userAgent.match(/iPhone/i)
  	|| navigator.userAgent.match(/iPad/i)
  	|| navigator.userAgent.match(/iPod/i)
  	|| navigator.userAgent.match(/BlackBerry/i)
  	|| navigator.userAgent.match(/Windows Phone/i)) {

	// Open the menu
 
}
else
{   
	var scrollHeight;

	// scrollHeight = $('#footer').offset().top - $('#Player').height() - $('#Player').offset().top;
  
	// $(window).scroll(function() {

	// 	// topLimit = ($('.footer').offset().top - window.innerHeight())+ window.scrollY;
	// 	topLimit = 0;
	// 	console.log('offset desde el footer'+$('.footer').offset().top)
	// 	console.log('Scroll'+window.scrollY)
	// 	console.log('Footer - Window'+ ( $('.footer').offset().top - window.innerHeight()) )
	// 	if (topLimit <= 165) {
	// 		console.log("es menor")
	// 	}
	// 	 //    if (scrollHeight <= 160) {
	// 	 //        $('#Player').css({
	// 	 //            'position': 'relative', 
	// 	 //            'margin-top':'100px'
	// 	 //        });
	// 	 //    } else {
	// 	 //        $('#Player').css({
	// 	 //            'position': 'fixed'
	// 	 //        });
	// 	 //    }
	// });

	$('#comment').attr("placeholder", "Enter your number");

	$('#reply-title').click(function () {
		$('#respond').delay(500).toggleClass('respondOpened');	 
		return false;
	});
	$('#cancel-comment-reply-link').click(function () {
		return true;
	});

	$('#comment').attr("placeholder", "Enter your number");

	$('#reply-title').click(function () {
		$('#respond').delay(500).toggleClass('respondOpened');	 
		return false;
	});
	$('#cancel-comment-reply-link').click(function () {
		return true;
	});
 

}