$(document).ready(function() {
	$('.show-menu').click(function() {
		console.log('clicked')
		$('.site-navigation__main-navigation').toggleClass('open');
	});
});