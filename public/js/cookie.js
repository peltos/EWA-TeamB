$( document ).ready(function() {
    let cookie = $(".cookie");
    let cookieButton = $(".cookie--button");

    cookieButton.click(function(e){
        e.preventDefault();
        cookie.toggleClass("hidden");

        $.ajax({
            url: URL + 'ajax/ajaxcookie',
            type: "post",
            data: "cookie=true",
            success: function (html) {
            }
        });


    });
});