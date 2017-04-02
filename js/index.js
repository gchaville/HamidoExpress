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
})