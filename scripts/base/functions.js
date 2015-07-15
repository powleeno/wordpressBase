function stretch_image(element) {
    $(element).each(function(){

        var main_column = $(this).find('.main');
	    var secondary_column = $(this).find('.secondary');
        var image = secondary_column.find('.image');

        // Size secondary column height ------------------------------------------
        var secondary_column_height;
        if ( $(window).width() > window_small ) { // large and medium screen size
            if( main_column.outerHeight() > secondary_column.innerWidth() ) {
                secondary_column_height = main_column.outerHeight();
            } else {
                secondary_column_height = secondary_column.innerWidth();
            }
        } else { // small screen sizes
            secondary_column_height = secondary_column.innerWidth();
        }
        secondary_column.outerHeight( secondary_column_height );

        // Size image width and set margin ---------------------------------------
        var image_width, margin_left;
        if( image.hasClass("ratio-13") || image.hasClass("ratio-22") ) {
            image_width = secondary_column.offset().left + secondary_column.innerWidth();
            margin_left = 0 - secondary_column.offset().left - image.position().left;
        } else if( image.hasClass("ratio-31") ) {
            image_width = $(window).width() - secondary_column.offset().left;
            margin_left = 0 - image.position().left;
        }
        image.outerWidth(image_width);
        image.css("margin-left", margin_left);

    });
}



function stretch_box(element) {
    $(element).each(function(){

        var main_column = $(this).find('.main');
        var secondary_column = $(this).find('.secondary');
        var main_column_text = main_column.find('.text-wrapper');
        var secondary_column_text = secondary_column.find('.text-wrapper');
        var back = secondary_column.find('.back');

        // Size secondary column height ------------------------------------------
        var main_column_height, secondary_column_height;
        if ( $(window).width() > window_small ) { // large and medium screen size
            if ( main_column_text.height() > secondary_column_text.height() ) {
                main_column_height = secondary_column_height = main_column_text.height() + main_column_text.position().top * 2;
            } else if ( main_column_text.height() < secondary_column_text.height() ) {
                main_column_height = secondary_column_height = secondary_column_text.height() + secondary_column_text.position().top * 2;
            }
        } else { // small screen sizes
            main_column_height = main_column_text.height() + main_column_text.position().top * 2;
            secondary_column_height = secondary_column_text.height() + secondary_column_text.position().top * 2;
        }
        main_column.outerHeight( main_column_height );
        secondary_column.outerHeight( secondary_column_height );

        // Size back width and height and set margin -----------------------------
        var back_width, margin_left;
        if ( $(window).width() > window_medium ) { // large screen size
            if( back.hasClass("ratio-13") || back.hasClass("ratio-22") ) {
                back_width = secondary_column.offset().left + secondary_column.innerWidth() + box_back_padding;
                margin_left = 0 - secondary_column.offset().left - back.position().left;
            } else if( back.hasClass("ratio-31") ) {
                back_width = $(window).width() - secondary_column.offset().left + box_back_padding;
                margin_left = 0 - back.position().left - box_back_padding;
            }
        } else { // medium and small screen sizes
            back_width = secondary_column.innerWidth();
            margin_left = 0 - back.position().left;
        }
        back.outerWidth( back_width );
        back.css( "margin-left", margin_left );
        back.css( "margin-top", 0 - secondary_column_text.position().top );

    });
}