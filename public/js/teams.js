$( document ).ready(function() {
    let item = $(".slider-item--teams");
    let teams = $(".slider--item__info-teams");
    let switchIcons = $(".switch-icons");

    item.click(function(){
        $(this).parent(switchIcons).next().toggleClass("teams");
        $(this).parent(switchIcons).next().next().removeClass("match");
    });
});
