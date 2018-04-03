function openCity(evt, gameName) {
    if(gameName !== 'all') {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(gameName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    else{
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "block";
        }
    }
}

$( document ).ready(function() {

    let onlineNav = $("#onlineNav");
    let miscNav = $(".tablinks:not(#onlineNav)");

    onlineNav.click(function(e){
        $(".streamers--item").css( "display", "block" );
        $(".streamers--item:not(.online)").css( "display", "none" );
    });
    miscNav.click(function(e){
        $(".streamers--item").css( "display", "block" );
    });
});