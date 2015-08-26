$(document).ready(function() {
	$('.mob-menu').click(function() {
		console.log('clicked')
		$('.site-navigation__main-navigation').toggleClass('open');
	});
});