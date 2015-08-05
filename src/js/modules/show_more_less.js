$(document).ready(function () {
    $(".slide").hide();
    $(".slide:first").css( "display", "block" );
    $(".show_hide:first").text("Show Less -");

    $('.show_hide').click(function (e) {
        var slide_content = $(this).closest('.sliding_content').find('.slide');
        slide_content.slideToggle(500);
        var val = $(this).text() == "Show Less -" ? "Show More +" : "Show Less -";
        $(this).hide().text(val).fadeIn("fast");
        e.preventDefault();
    });
});