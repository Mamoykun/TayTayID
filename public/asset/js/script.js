var offsetHeight = 100;
$('body').scrollspy({
	offset: offsetHeight
});

$('#navbar-atas ul > li > a').click(function(event){
	var elementScroll = $('body').find($(this).attr('href'));
	var scrollPos = elementScroll.offset().top - (offsetHeight - 1);
	$('body,html').animate({
		scrollTop: scrollPos
	}, 500, function () {
		$(".btn-navbar").click();
	});
	return false;
});