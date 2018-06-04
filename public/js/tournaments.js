$( document ).ready(function() {

    // show the team screen when clicked on the team icon

    let switchIconsTeams = $(".switch-icons");

    item.click(function(){
        $(this).parent(switchIcons).next().toggleClass("teams");
        $(this).parent(switchIcons).next().next().removeClass("match");
    });

    // show the tournaments screen when clicked on the tournaments icon

    let switchIconsTournaments = $(".switch-icons");

    item.click(function(){
        $(this).parent(switchIcons).next().next().toggleClass("match");
        $(this).parent(switchIcons).next().removeClass("teams");
    });
});
