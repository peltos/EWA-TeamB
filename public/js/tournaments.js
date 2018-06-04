$( document ).ready(function() {

    // show the team screen when clicked on the team icon
    let itemTeams = $(".slider-item--teams");
    let switchIconsTeams = $(".switch-icons");

    itemTeams.click(function(){
        $(this).parent(switchIcons).next().toggleClass("teams");
        $(this).parent(switchIcons).next().next().removeClass("match");
    });

    // show the tournaments screen when clicked on the tournaments icon

    let itemTournaments = $(".slider-item--info");
    let switchIconsTournaments = $(".switch-icons");

    itemTournaments.click(function(){
        $(this).parent(switchIcons).next().next().toggleClass("match");
        $(this).parent(switchIcons).next().removeClass("teams");
    });
});
