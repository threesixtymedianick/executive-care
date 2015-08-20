$(document).ready(function () {
    $(".slide").hide();
    $(".slide:first").css( "display", "block" );
    $(".show_hide:first").text("Show Less -");

    $('.our-care__left__sliding__title').click(function (e) {
        var slide_content = $(this).closest('.sliding_content').find('.slide');
        slide_content.slideToggle(500);

        var showMore = "Show More +";
        var showLess = "Show Less -";

        var text = $(this).find('.show_hide').text();
        console.log(text);

        if (text === showMore) {
            text = showLess;
        } else {
            text = showMore;
        }

        $(this).find('.show_hide').text(text);

        e.preventDefault();
    });
});