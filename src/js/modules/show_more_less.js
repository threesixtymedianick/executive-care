$(document).ready(function () {
    $(".slide").hide();

    $('.show_hide').click(function (e) {
        var slide_content = $(this).closest('.sliding_content').find('.slide');
        slide_content.slideToggle("fast");
        var val = $(this).text() == "Less -" ? "More +" : "Less -";
        $(this).hide().text(val).fadeIn("fast");
        e.preventDefault();
    });
});