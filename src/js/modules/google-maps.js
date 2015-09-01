/**
 * Initialise Google Maps
 */
var placeLocation;

function initializeGoogleMaps() {
    // The map object
    var map;

    // The window that shows when you click the marker
    var infowindow;

    if ($('#map-canvas').length === 0) {
        return false;
    }

    // Our place ID
    var googlePlaceId = document.getElementById('map-canvas').getAttribute("data-placeId");

    if (googlePlaceId === 'undefined' || googlePlaceId === null) {
        return false
    }

    // Create a new map object in the "map-canvas" element
    map = new google.maps.Map(document.getElementById('map-canvas'));

    // Maps info window
    var infowindow = new google.maps.InfoWindow();

    // Get the places service
    var service = new google.maps.places.PlacesService(map);

    // Place a marker on the map using the place we setup earlier
    service.getDetails({placeId: googlePlaceId}, function (place, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
            placeLocation = place;

            // Center the map and set the zoom level
            map.setOptions({
                center: placeLocation.geometry.location, // Center on the care home
                zoom: 16 // Zoom right in. Higher is more zoom
            });

            // Place the marker
            var marker = new google.maps.Marker({
                map: map,
                position: placeLocation.geometry.location
            });

            // An onclick listener for the marker
            google.maps.event.addListener(marker, 'click', function () {
                infowindow.setContent(place.name);
                infowindow.open(map, this);
            });
        }
    });

    // Create the DIV to hold the control and
    // call the CenterControl() constructor passing
    // in this DIV.
    var viewOnGoogleDiv = document.createElement('div');
    var centerControl = new openMapsInGoogleMaps(viewOnGoogleDiv);

    // Place the control div
    viewOnGoogleDiv.index = 1;
    map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(viewOnGoogleDiv);
}

/**
 * Sets up the button for for opening the place in Google maps
 * @param controlDiv The div in which to style and control
 * @param map The map object to place the controls
 */
function openMapsInGoogleMaps(controlDiv) {

    // Set CSS for the control border
    var controlUI = document.createElement('div');
    controlUI.style.backgroundColor = '#fff';
    controlUI.style.cursor = 'pointer';
    controlUI.style.marginBottom = '22px';
    controlUI.style.textAlign = 'center';
    controlUI.title = 'Click to open on GoogleMaps';
    controlDiv.appendChild(controlUI);

    // Set CSS for the control interior
    var controlText = document.createElement('div');
    controlText.style.color = '#5B7F9F';
    controlText.style.textTransform = 'uppercase';
    controlText.style.fontFamily = 'Raleway,Open Sans';
    controlText.style.fontWeight = 'bold';
    controlText.style.fontSize = '14px';
    controlText.style.lineHeight = '38px';
    controlText.style.paddingLeft = '5px';
    controlText.style.paddingRight = '5px';
    controlText.innerHTML = 'View on Google';
    controlUI.appendChild(controlText);

    // Setup the click event listeners. On click, open the place on Google Maps
    google.maps.event.addDomListener(controlUI, 'click', function () {
        var url = "https://www.google.com/maps/place/" + placeLocation.name + "+" + placeLocation.vicinity;
        if (placeLocation != null) {
            window.open(url, '_blank');
        }
    });
}

google.maps.event.addDomListener(window, 'load', initializeGoogleMaps);