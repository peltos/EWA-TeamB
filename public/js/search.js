$( document ).ready(function() {
    let searchIcon = $("#search-icon");
    let searchbar = $("#searchbar");

    searchIcon.click(function(){
        $(this).toggleClass("hidden");
        $(searchbar).toggleClass("hidden");
    });
});