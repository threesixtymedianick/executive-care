var map;
var infowindow;

function initializeGoogleMaps() {
    var cch = new google.maps.LatLng(53.961533, -1.535130);

    map = new google.maps.Map(document.getElementById('map-canvas'), {
        center: cch,
        zoom: 16
    });

    var request = {
        placeId: 'ChIJ72CCHT5ReUgR0MXrdLSsG-A'
    };

    var infowindow = new google.maps.InfoWindow();
    var service = new google.maps.places.PlacesService(map);

    service.getDetails(request, function(place, status) {
        if (status == google.maps.places.PlacesServiceStatus.OK) {
            var marker = new google.maps.Marker({
                map: map,
                position: place.geometry.location
            });
            google.maps.event.addListener(marker, 'click', function() {
                infowindow.setContent(place.name);
                infowindow.open(map, this);
            });
        }
    });

    // Create the DIV to hold the control and
    // call the CenterControl() constructor passing
    // in this DIV.
    var centerControlDiv = document.createElement('div');
    var centerControl = new openMapsInGoogleMaps(centerControlDiv, map);

    centerControlDiv.index = 1;
    map.controls[google.maps.ControlPosition.BOTTOM_LEFT].push(centerControlDiv);

}

function openMapsInGoogleMaps(controlDiv, map) {

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

    // Setup the click event listeners: simply set the map to
    // Chicago
    google.maps.event.addDomListener(controlUI, 'click', function() {
        var url = "https://www.google.com/maps/place/Crystal+Court/@53.962505,-1.53513,16z/data=!4m2!3m1!1s0x0:0xe01bacb474ebc5d0?hl=en-GB";
        window.open(url,'_blank');
    });

}

google.maps.event.addDomListener(window, 'load', initializeGoogleMaps);