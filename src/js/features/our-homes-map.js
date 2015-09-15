$(document).ready(function() {
    if ($('#our-homes .map').length > 0) {
        // Google Map Options
        var options = {
            zoom: 7,
            center: new google.maps.LatLng(53.7996388, -1.5491221),
            disableDefaultUI: true,
            zoomControl: true,
            scrollwheel: false,
            disableDoubleClickZoom: false
        };

        // Initalise map
        var map = new google.maps.Map(document.getElementById('map'), options);

        // Get care home JSON
        $.ajax({
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
        });
    }
});
