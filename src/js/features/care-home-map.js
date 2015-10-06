$(document).ready(function() {
    if ($('#careHomeMap').length > 0) {

        var mapDiv    = $('#careHomeMap'),
               lat    = mapDiv.data('lat'),
               lon    = mapDiv.data('lon'),
               latLon = new google.maps.LatLng(lat, lon);

        // Google Map Options
        var options = {
            zoom: 7,
            center: latLon,
            disableDefaultUI: true,
            zoomControl: true,
            scrollwheel: false,
            disableDoubleClickZoom: false
        };

        // Initalise map
        var map = new google.maps.Map(document.getElementById('careHomeMap'), options);

        // Get care home JSON
        /*$.ajax({
            url: '/ajax/care-homes',
            type: 'GET',
            dataType: 'json',
        })
        .done(function(data) {
            $.each(data, function(key, data) {
                // Check lat long is specified
                if (data.lat !== null && data.lon !== null) {
                    // Create LatLng
                    var latLng = new google.maps.LatLng(data.lat, data.lon);

                    var iconBase = '../website/static/images/place_icons/';

                    // Create marker
                    var marker = new google.maps.Marker({
                        position: latLng,
                        icon: iconBase + 'place_icon_1.png',
                        map: map,
                    });
                }
            });
        })
        .fail(function() {
            // Handle errors
        });*/
    }
});
