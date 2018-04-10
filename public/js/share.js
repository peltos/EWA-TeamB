$( document ).ready(function() {
    let item = $(".streamer--item__share");
    let social = $(".streamer--item__social");

    item.click(function(){
        $(this).siblings(social).toggleClass("social");
    });
});