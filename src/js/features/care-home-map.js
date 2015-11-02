$(document).ready(function() {
    if ($('#careHomeMap').length > 0) {

        var mapDiv    = $('#careHomeMap'),
               id     = mapDiv.data('id'),
               lat    = mapDiv.data('lat'),
               lon    = mapDiv.data('lon'),
               latLon = new google.maps.LatLng(lat, lon);

        // Google Map Options
        var options = {
            zoom: 9,
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
            icon: '/website/static/images/buttons/icons/place-icon.png',
            map: map,
        });
    }
});
