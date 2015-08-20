$(document).ready(function () {
    $(".slide").hide();
    $(".slide:first").css( "display", "block" );
    $(".show_hide:first").text("Show Less -");

    $('.our-care__left__sliding__title').click(function (e) {
       $(this).closest('.sliding_content').find('.slide').slideToggle(500);

        var text = $(this).find('.show_hide').text();

        if (text === "Show More +") {
            text = "Show Less -";
        } else {
            text = "Show More +";
        }

        $(this).find('.show_hide').text(text);

        e.preventDefault();
    });
});