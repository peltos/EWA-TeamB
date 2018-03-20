$body = $("body");

// Initiates an AJAX request on click
$(".navigation--item").on("click", function(){
    $body.addClass("loading");
});