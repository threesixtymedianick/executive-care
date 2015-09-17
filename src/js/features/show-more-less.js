$(document).ready(function () {
    $(".slide").hide();
    $(".slide:first").css( "display", "block" );

    var showHide = $(".show_hide:first");
    var showMoreText = "Show More +";
    var showLessText = "Show Less -";
    var viewText = "View +";
    var hideText = "Hide -";
    var errorText = "Error";
    
    if (showHide.text() === showMoreText) {
        showHide.text(showLessText);
    } else if (showHide.text() === viewText) {
        showHide.text(hideText);
    } else  {
        showHide.text(errorText); // Shouldn't be here
    }

    function controlSlide(e) {
        $(this).closest('.sliding_content').find('.slide').slideToggle(500);

        var text = $(this).find('.show_hide').text();

        if (text === showMoreText) {
            text = showLessText;
        } else if (text === showLessText){
            text = showMoreText;
        } else if(text === viewText) {
            text = hideText;
        } else if (text === hideText) {
            text = viewText;
        } else {
            text = errorText; // Shouldn't be here
        }

        $(this).find('.show_hide').text(text);

        e.preventDefault();
    }

    $('.our-care__left__sliding__title').click(function (e) {
        controlSlide.call(this, e);
    });

    $('.our-homes__left__sliding__title').click(function (e) {
        controlSlide.call(this, e);
    });
});