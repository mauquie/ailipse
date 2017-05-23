// When the user scrolls down 20px from the top of the document, show the button


window.onscroll = function() {scrollFunction()};

function scrollFunction() {
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		$( "#myBtn" ).fadeIn( "fast");
	} else {
		$( "#myBtn" ).fadeOut( "fast");
	}
}

// When the user clicks on the button, scroll to the top of the document
function scrollToTop() {
	$( 'body' ).animate({scrollTop: 0}, 'slow');
	 return false;
}

function scrollToAnchor(aid){
    $('html,body').animate({scrollTop: $(aid).offset().top},'slow');
	return false;
}