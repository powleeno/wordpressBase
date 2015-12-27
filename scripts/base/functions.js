function base_stretch_object()
{
	$('.base_str_obj').each(function ()
	{
		var str_obj = $(this),
			str_con = str_obj.parent('.base_str_con'),
			str_ref = str_con.parent().find('.base_str_ref');

		// Set fundamental str_obj styles -----------------------------------------
		str_obj.css({
			'position': 'absolute',
			'background-size': 'cover',
			'background-position': '50%',
			'height': '100%'
		});

		// Set str_con height -----------------------------------------------------
		var str_con_height;

		if (Foundation.utils.is_medium_up()) { // large and medium screen size
			if (str_ref.innerHeight() > str_con.innerWidth()) {
				str_con_height = str_ref.innerHeight();
			} else {
				str_con_height = str_con.innerWidth();
			}
		} else { // small screen sizes
			str_con_height = str_con.innerWidth();
		}
		str_con.outerHeight(str_con_height);


		var str_obj_width, str_obj_margin_left;
		if (str_obj.hasClass('base_str_top')) {

			// Set str_obj width and margin -------------------------------------------

			if (str_obj.hasClass('base_str_left')) {
				str_obj_width = str_con.offset().left + str_con.innerWidth();
				str_obj_margin_left = 0 - str_con.offset().left - str_obj.position().left;
			} else if (str_obj.hasClass('base_str_right')) {
				str_obj_width = $(window).width() - str_con.offset().left;
				str_obj_margin_left = 0 - str_obj.position().left;
			}
			str_obj.outerWidth(str_obj_width);
			str_obj.css('margin-left', str_obj_margin_left);

		} else if (str_obj.hasClass('base_str_box')) {

			str_obj_width = str_con.innerWidth();
			str_obj.outerWidth(str_obj_width);

		}

	});

}


function base_form_validation()
{
	$('#form').each(function ()
	{
		var form = $(this);
		form.validate({
			rules: {
				first_name: {
					required: true
				},
				last_name: {
					required: true
				},
				email: {
					required: true
				},
				enterprise: {
					required: true
				},
				subject: {
					required: true
				},
				message: {
					required: true
				}
			},
			invalidHandler: function(form, validator)
			{
				$('.base_form_notice').addClass('error');
				/*
				 for (var i = 0; i < validator.errorList.length; i++) {
				 var label = $(validator.errorList[i].element).siblings();
				 label.addClass('error');
				 }
				 */
			},
			errorPlacement: function (error, element)
			{
				return false;
			}
		});
	});
}