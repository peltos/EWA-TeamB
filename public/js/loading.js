$body = $("body");

// Initiates an AJAX request on click
$(".navigation--item:not(.user)").on("click", function(){
    $body.addClass("loading");
});