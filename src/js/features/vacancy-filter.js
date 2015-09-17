$(document).ready(function() {
    if ($('.careers__left__content__box--search').length > 0) {

        /**
         * urlParams array
         */
        var urlParams;

        /**
         * URL to redirect to
         * @type {String}
         */
        var filterUrl = '/vacancy/filter';

        // Get query string params
        (window.onpopstate = function () {
            var match,
                pl     = /\+/g,  // Regex for replacing addition symbol with a space
                search = /([^&=]+)=?([^&]*)/g,
                decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
                query  = window.location.search.substring(1);

            urlParams = {};
            while (match = search.exec(query))
               urlParams[decode(match[1])] = decode(match[2]);
        })();

        var home = urlParams['home'],
            role = urlParams['role'];

        if (typeof home !== 'undefined') {
            $('select#home_search').val(home);
        }

        if (typeof role !== 'undefined') {
            $('select#vacancy_search').val(role);
        }

        // Filter vacancies by care home
        $('select#home_search').change(function() {
            window.location.href = filterUrl + '?home=' + $(this).val();
        });

        // Filter vacancies by role
        $('select#vacancy_search').change(function() {
            window.location.href = filterUrl + '?role=' + $(this).val();
        });
    }
});

