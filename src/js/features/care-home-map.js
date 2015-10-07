$(document).ready(function() {
    if ($('#careHomeMap').length > 0) {

        var mapDiv    = $('#careHomeMap'),
               id     = mapDiv.data('id'),
               lat    = mapDiv.data('lat'),
               lon    = mapDiv.data('lon'),
               latLon = new google.maps.LatLng(lat, lon);

        // Google Map Options
        var options = {
            zoom: 13,
            center: latLon,
            disableDefaultUI: true,
            zoomControl: true,
            scrollwheel: false,
            disableDoubleClickZoom: false,
        };

        // Initalise map
        var map = new google.maps.Map(document.getElementById('careHomeMap'), options);

        var marker = new google.maps.Marker({
            position: latLon,
            icon: '/website/static/images/place_icons/place_icon_1.png',
            map: map,
        });
    }
});
