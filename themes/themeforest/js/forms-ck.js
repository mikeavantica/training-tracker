$(document).ready(function() {
    $("textarea").autosize();
    var e = "#datepicker";
    $(e).datepicker({
        showOtherMonths: !0,
        selectOtherMonths: !0,
        dateFormat: "d MM, yy",
        yearRange: "-1:+1"
    }).prev(".btn").on("click", function(t) {
        t && t.preventDefault();
        $(e).focus();
    });
    $("#editor").wysiwyg();
    $("#colorpicker").colorpicker();
});

$(function() {
    $("#tags_1").tagsInput({
        width: "auto"
    });
    $("#tags_2").tagsInput({
        width: "auto",
        onChange: function(e, t) {
            var n = [ "php", "ruby", "javascript" ];
            $(".tag", t).each(function() {
                $(this).text().search(new RegExp("\\b(" + n.join("|") + ")\\b")) >= 0 && $(this).css("background-color", "#5BC0DE");
            });
        }
    });
});