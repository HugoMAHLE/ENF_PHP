$(document).ready(function(){
	$('ul.tabs li a:first').addClass('active');
	$('.divisiones section').hide();
	$('.divisiones section:first').show();

	$('ul.tabs li a').click(function(){
		$('ul.tabs li a').removeClass('active');
		$(this).addClass('active');
		$('.divisiones section').hide();

		var activeTab = $(this).attr('href');
		$(activeTab).show();
		return false;
	});
});