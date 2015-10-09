$(document).ready(function() {
    if ($('.our-homes .map').length > 0) {
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
                // Set the info box to show the first care home
                if (key === 0) {
                    updateCareHomeDetails(data.id);
                }

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
                        careHomeId: data.id,
                    });

                    marker.addListener('click', function() {
                        updateCareHomeDetails(marker.careHomeId);
                    });
                }
            });
        })
        .fail(function() {
            // Handle errors
        });

        function updateCareHomeDetails(id) {
            $.ajax({
                url: '/ajax/care-home/' + id,
                type: 'GET',
                dataType: 'json',
            })
            .done(function(data) {
                $('.homecontent > h3.title').html(data.Title);
                $('.homecontent > p').html(data.Address + ' ' + data.Postcode);
                if (null !== data.ListingImage && "" !== data/ListingImage) {
                    $('.sidebar__panel--our-homes-find-a-home-image').css("background", "url('" + data.ListingImage + "')");
                } else {
                    $('.sidebar__panel--our-homes-find-a-home-image').css("background", "url('/website/static/images/home/find-a-home.png')");
                }
                $('.homecontent > a').attr('href', '/care-homes/detail/' + data.o_key);
            })
            .fail(function() {

            })
        }
    }
});
