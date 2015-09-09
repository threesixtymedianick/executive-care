$(document).ready(function() {
    if ($('.sidebar__panel--recommendation').length > 0) {
        $('.sidebar__panel--recommendation').matchHeight({
            target: $('.home__panel.home__panel--split.home__our-care-explained')
        });
    }
})
