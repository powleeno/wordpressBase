/** ----------------------------------------------------------------------
 * Map styles JSON array
 * Defines styles for the map
 * Style generator online tool :: http://snazzymaps.com/
 */

var map_style = [
	{
		"featureType": "landscape",
		"stylers": [
			{
				"saturation": -100
			},
			{
				"lightness": 65
			},
			{
				"visibility": "on"
			}
		]
	},
	{
		"featureType": "poi",
		"stylers": [
			{
				"saturation": -100
			},
			{
				"lightness": 51
			},
			{
				"visibility": "simplified"
			}
		]
	},
	{
		"featureType": "road.highway",
		"stylers": [
			{
				"saturation": -100
			},
			{
				"visibility": "simplified"
			}
		]
	},
	{
		"featureType": "road.arterial",
		"stylers": [
			{
				"saturation": -100
			},
			{
				"lightness": 30
			},
			{
				"visibility": "on"
			}
		]
	},
	{
		"featureType": "road.local",
		"stylers": [
			{
				"saturation": -100
			},
			{
				"lightness": 40
			},
			{
				"visibility": "on"
			}
		]
	},
	{
		"featureType": "transit",
		"stylers": [
			{
				"saturation": -100
			},
			{
				"visibility": "simplified"
			}
		]
	},
	{
		"featureType": "administrative.province",
		"stylers": [
			{
				"visibility": "off"
			}
		]
	},
	{
		"featureType": "water",
		"elementType": "labels",
		"stylers": [
			{
				"visibility": "on"
			},
			{
				"lightness": -25
			},
			{
				"saturation": -100
			}
		]
	},
	{
		"featureType": "water",
		"elementType": "geometry",
		"stylers": [
			{
				"hue": "#ffff00"
			},
			{
				"lightness": -25
			},
			{
				"saturation": -97
			}
		]
	}
];


/** ----------------------------------------------------------------------
 * Map options array
 * Defines settings/functionalities
 */

var map_options = {
	disableDefaultUI: true,
	disableDoubleClickZoom: false,
	draggable: true,
	keyboardShortcuts: true,
	mapTypeControl: true,
	mapTypeControlOptions: {
		mapTypeIds: [
			google.maps.MapTypeId.HYBRID,
			google.maps.MapTypeId.ROADMAP,
			google.maps.MapTypeId.SATELLITE,
			google.maps.MapTypeId.TERRAIN
		],
		position: google.maps.ControlPosition.TOP_RIGHT,
		style: google.maps.MapTypeControlStyle.DEFAULT
	},
	overviewMapControl: true,
	overviewMapControlOptions: {
		opened: true
	},
	panControl: true,
	panControlOptions: {
		position: google.maps.ControlPosition.TOP_LEFT
	},
	rotateControl: true,
	rotateControlOptions: {
		position: google.maps.ControlPosition.TOP_LEFT
	},
	scrollwheel: false,
	streetViewControl: true,
	streetViewControlOptions: {
		position: google.maps.ControlPosition.TOP_LEFT
	},
	zoomControl: true,
	zoomControlOptions: {
		style: google.maps.ZoomControlStyle.LARGE,
		position: google.maps.ControlPosition.TOP_LEFT
	}
};


/** ----------------------------------------------------------------------
 * Needed outside google_map() because of geocoding asynchronous call
 * This way information can be passed to infowindow
 */

function base_geo_code_callback(map, map_bounds, information)
{
	var geo_code = function (results, status)
	{
		if (status == google.maps.GeocoderStatus.OK) {

			// Marker
			var marker = new google.maps.Marker({
				map: map,
				position: results[0].geometry.location
			});

			// Infowindow
			var infowindow = new google.maps.InfoWindow({
				content: information,
				maxWidth: 200
			});

			google.maps.event.addListener(marker, 'click', function ()
			{
				infowindow.open(map, marker);
			});

			google.maps.event.addListener(map, 'click', function ()
			{
				infowindow.close();
			});


			// Adjust map bounds to markers
			map_bounds.extend(results[0].geometry.location);
			map.fitBounds(map_bounds);

			// Change map zoom asynchronously
			var map_zoom_listener = google.maps.event.addListenerOnce(map, 'bounds_changed', function (event)
			{
				if (map.getZoom() > map_options.zoom) {
					map.setZoom(map_options.zoom);
				}
			});
			setTimeout(function ()
			{
				google.maps.event.removeListener(map_zoom_listener)
			}, 2000);

		} else {
			console.log('Geocode was not successful for the following reason: ' + status);
		}
	};
	return geo_code;
}


/** ----------------------------------------------------------------------
 * Map creation
 * Receives: DOM element, fallback zoom and map center
 */

function base_google_map(args)
{
	var map_canvas = document.getElementById(args.element);
	if (map_canvas) {

		// Create map and assign styles
		var map_type_id = 'map-type-id';
		map_options.mapTypeId = map_type_id;
		map_options.center = new google.maps.LatLng(args.center_latitude, args.center_longitude);
		map_options.zoom = args.zoom;
		var map = new google.maps.Map(map_canvas, map_options),
			map_type = new google.maps.StyledMapType(map_style),
			map_bounds = new google.maps.LatLngBounds();
		map.mapTypes.set(map_type_id, map_type);

		// Create markers
		if (typeof locations_array !== 'undefined') {
			for (var i = 0; i < locations_array.length; i++) {

				// Get locations from addresses and add markers
				var map_geocoder = new google.maps.Geocoder();
				map_geocoder.geocode(
					{'address': locations_array[i].address},
					base_geo_code_callback(map, map_bounds, locations_array[i].information)
				);

			}
		}

	}
}
