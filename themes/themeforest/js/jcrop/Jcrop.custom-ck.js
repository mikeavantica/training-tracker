function showCoords(e) {
    jQuery("#x1").val(e.x);
    jQuery("#y1").val(e.y);
    jQuery("#x2").val(e.x2);
    jQuery("#y2").val(e.y2);
    jQuery("#wid").val(e.w);
    jQuery("#hei").val(e.h);
}

function updateCoords(e) {
    $("#x").val(e.x);
    $("#y").val(e.y);
    $("#w").val(e.w);
    $("#h").val(e.h);
}

function checkCoords() {
    if (parseInt($("#w").val())) return !0;
    alert("Please select a crop region then press submit.");
    return !1;
}

jQuery(function(e) {
    e("#target").Jcrop({
        onSelect: showCoords,
        onChange: showCoords
    });
});

$(function() {
    $("#cropbox").Jcrop({
        aspectRatio: 1,
        onSelect: updateCoords
    });
});