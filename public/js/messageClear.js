$( document ).ready(function() {
    let navigationItem = $(".navigation--item");

    navigationItem.click(function(e){

        $.ajax({
            url: URL + 'ajax/messageClear',
            type: "post",
            data: "messageClear=true",
            success: function (html) {
            }
        });


    });
});