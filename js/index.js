$(document).ready(function () {

    $('.departure-search').submit(function()
    {
        //console.log($('.departure-search').serializeArray());
        $.ajax({
            type: "post",
            url: "scripts/gettravels.php",
            data: $('.departure-search').serializeArray(),
            success: function(a){
                console.log(a);
                var b = $.parseJSON(a);
                $('.departures').html(""), $.each(b,function (a,b) {

                    $('.departures').append('<li class="list-group-item">' +
                        b.Departure + " " +
                        b.Arrival + " " +
                        b.Price + " " +
                        b.Date_Departure + " " +
                        b.Nb_passenger +

                        '</li>')
                })
            }
        })
    });


    function userinfos()
    {
        $.ajax({
            type: "post",
            url: "scripts/getuserinfos.php",
            success: function(a) {
                console.log(a);
                var b = $.parseJSON(a);
                // Rajoute de quoi pour ton formulaire ou autre chose b.column1 (column comme la table de la BD)
                }
        })
    }
})