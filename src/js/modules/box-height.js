$(document).ready(function() {
    if ($('#home .sidebar__panel--recommendation').length > 0) {
        $('#home .sidebar__panel--recommendation').matchHeight({
            target: $('#home .sidebar__panel--care-explained')
        });
    }
})
