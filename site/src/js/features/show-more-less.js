$(document).ready(function () {
    $(".slide").hide();
    $(".slide:first").css( "display", "hidden" );

    var showMoreText = '<span class="desktop-hide">Show More </span>+';
    var showLessText = '<span class="desktop-hide">Show Less </span>-';
    var viewText = '<span class="desktop-hide">View </span>+';
    var hideText = '<span class="desktop-hide">Hide </span>+';
    var errorText = "Error";

    var plus = "+";
    var minus = "-";

    function controlSlide(e) {
        $(this).closest('.sliding_content').find('.slide').slideToggle(500);

        var text = $(this).find('.show_hide').html();

        switch (text) {
            case showMoreText:
                text = showLessText;
                break;
            case showLessText:
                text = showMoreText;
                break;
            case viewText:
                text = hideText;
                break;
            case hideText:
                text = viewText;
                break;
            case plus:
                text = minus;
                break;
            case minus:
                text = plus;
                break;
            default:
                text = errorText; // Shouldn't be here
                break;
        }

        $(this).find('.show_hide').html(text);

        e.preventDefault();
    }

    // init();

    $('.our-care__left__sliding__title').click(function (e) {
        controlSlide.call(this, e);
    });

    $('.our-homes__left__sliding__title').click(function (e) {
        controlSlide.call(this, e);
    });
});