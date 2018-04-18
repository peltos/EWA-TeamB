$( document ).ready(function() {
    let item = $(".slider-item--info");
    let match = $(".slider--item__info-match");
    let switchIcons = $(".switch-icons");

    item.click(function(){
        $(this).parent(switchIcons).next().next().toggleClass("match");
        $(this).parent(switchIcons).next().removeClass("teams");
    });
});
