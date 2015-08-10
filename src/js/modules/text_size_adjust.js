function resizeText(multiplier) {
    if (document.body.style.fontSize == "") {
        document.body.style.fontSize = "0.625em";
    }

    if (multiplier == 0) {
        document.body.style.fontSize = "0.625em";
    } else {
        document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.1) + "em";
    }
}

$(document).ready(function() {

    $("#sizeUp").click(function() {
        resizeText(1);
    });

    $("#normal").click(function() {
        resizeText(0);
    })

    $("#sizeDown").click(function() {
        resizeText(-1);
    })
});