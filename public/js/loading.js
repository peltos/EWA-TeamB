$body = $("body");

// Initiates an AJAX request on click
$(document).on("click", function(){
    $body.addClass("loading");
});