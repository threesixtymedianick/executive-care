$(document).ready(function () {
    $(".slide").hide();
    $(".slide:first").css( "display", "hidden" );

    var showHide = $(".show_hide:first");
    var showMoreText = "Show More +";
    var showLessText = "Show Less -";
    var viewText = "View +";
    var hideText = "Hide -";
    var errorText = "Error";

    var plus = "+";
    var minus = "-";

    function init() {
        if (screen.width < 641) {
            showMoreText = plus;
            showLessText = minus;
            viewText = plus;
            hideText = minus;

            $('.show_hide').each(function() {
                $(this).text(plus);
            });

            showHide.text(minus);
        } else {
            if (showHide.text() == showMoreText) {
                showHide.text(showLessText);
            } else if (showHide.text() == viewText) {
                showHide.text(hideText);
            } else {
                showHide.text(errorText); // Shouldn't be here
            }
        }
    }

    function controlSlide(e) {
        $(this).closest('.sliding_content').find('.slide').slideToggle(500);

        var text = $(this).find('.show_hide').text();

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

        $(this).find('.show_hide').text(text);

        e.preventDefault();
    }

    init();

    $('.our-care__left__sliding__title').click(function (e) {
        controlSlide.call(this, e);
    });

    $('.our-homes__left__sliding__title').click(function (e) {
        controlSlide.call(this, e);
    });
});