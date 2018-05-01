$( document ).ready(function() {
    let star = $(".streamer-star");

    star.click(function(e){
        e.preventDefault();
        $(this).toggleClass("active");
        streamerId = $(this).attr('id');
        isActive = $(this).hasClass("active");

        $.ajax({
            url: URL + 'ajax/ajaxfavorite',
            type: "post",
            data: "streamerId=" + streamerId + "&isActive=" + isActive,
            success: function (html) {
            }
        });


    });
});
