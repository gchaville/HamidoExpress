
$('.search-button').click(function()
{
    $.ajax({
        type: "post",
        url: "localhost/HamidoExpress/scripts/gettravels.php",
        data:"departure="+$('#departure').value() +
        "arrival="+$('#arrival').value(),
        success: function(a){
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