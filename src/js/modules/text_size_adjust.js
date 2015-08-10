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

    $("#larger").click(function() {
        resizeText(1);
    });

    $("#smaller").click(function() {
        resizeText(-1);
    })
});