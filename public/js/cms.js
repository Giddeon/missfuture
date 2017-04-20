$( document ).ready(function() {

	var side_height = $('.side').height();
	$('.content').css('min-height', side_height);

	$('.js-auth .auth-password').hide();
	$('.auth-user input[type="radio"]').change(function() {
		var password = $('.js-auth .auth-password');
		if(this.checked) {
			password.show();
			var offset_top = $(this).parent().position().top;
			if (offset_top > 0) password.css('top', offset_top + 1);
			else password.css('top', 0);
		}
	});

	$('.user-info').click(function() {
		$(this).toggleClass('active');
		$(this).next('.user-menu').slideToggle(200);
	});
});