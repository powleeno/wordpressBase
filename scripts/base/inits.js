function init_ericbdev_accordion(element)
{
	/** Simple Grid Wordpress :: https://github.com/ericbdev/simpleGridWordPress **/
	$(element).on("click", function (e)
	{
		e.preventDefault();
		ericbdev_accordion($(this));
	});
}

function init_ericbdev_anchor_scroll(element)
{
	/** Simple Grid Wordpress :: https://github.com/ericbdev/simpleGridWordPress **/
	$(element).on("click", 'a[href*=#]:not([href=#])', function (e)
	{
		ericbdev_anchor_scroll(this, location, e);
	});
}

function init_fancybox(element)
{
	/** Fancybox 2 :: http://fancyapps.com/fancybox/#docs **/
	$(element).fancybox({
		helpers: {
			title: {
				type: 'inside'
			}
		}
	});
}

function init_foundation(element)
{
	/** Foundation Zurb :: http://foundation.zurb.com/docs/javascript.html **/
	$(element).foundation();
}

function init_base_google_map(element)
{
	base_google_map({
		element: element,
		center_latitude: 45.5050,
		center_longitude: -73.5567,
		zoom: 12
	});
}

function init_lazyload(element)
{
	/** Lazy Load :: http://www.appelsiini.net/projects/lazyload **/
	$(element).lazyload();
}

function init_masonry(element)
{
	/** Masonry :: http://masonry.desandro.com/options.html **/
	$(element).masonry({
		itemSelector: '.grid-item',
		columnWidth: 200
	});
}

function init_slick(element)
{
	/** Slick Slider :: http://kenwheeler.github.io/slick/ **/
	$(element).slick({
		infinite: true,
		slidesToShow: 2,
		slidesToScroll: 1
	});
}