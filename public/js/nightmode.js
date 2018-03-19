$( document ).ready(function() {
    let nightmode = $("#nightmode");
    let bodyClass = $("body");
    let url = window.location.href;

    nightmode.click(function(){
        bodyClass.toggleClass("light-theme dark-theme");
        let bodyVar = bodyClass.attr('class');
        $.ajax({
            url: '/EWA-TeamB/ajax/ajaxnightmode',
            type: "post",
            data: "modus=" + bodyVar,
            success: function (html) {
            }
        });


    });
});