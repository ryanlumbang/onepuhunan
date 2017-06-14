function model(mContent)
{
    $( ".overlay" ).fadeIn();
    $("body").css("overflow", "hidden");
    $('.mText').html(mContent);
    $( ".footer" ).on('click', function() {
        $( ".overlay" ).fadeOut();
        $("body").css("overflow", "visible");
    });
}

var bac = "heading"
var abc = '<div class="well"><h2>' + bac + '<h2></div>'
$(document).ready(function()
{
    model(abc);
});