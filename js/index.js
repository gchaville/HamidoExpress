$(document).ready(function () {

    $('.search-button').click(function()
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
                    $('.departures').append('<tr class="travel">' +
                        '<th scope="row">'+ b.Date_Departure +'</th>' +
                        '<td>'+ b.Departure + '</td>' +
                        '<td>'+ b.Arrival + '</td>' +
                        '<td>'+ b.Price + '</td>' +
                        '<td>'+ b.Nb_passenger + '</td>' +
                        '</tr>');
                })
            }
        })
    });

    function getDepartures() {
        $.ajax({
            type: "post",
            url: "scripts/gettowns.php",
            success: function(a){
                var b = $.parseJSON(a);
                $('#departures').html(""), $.each(b,function (a,b) {
                    $('#departures').append('<option value="' + b.Id + '">' + b.Name + ', ' + b.Province + '</option>');
                })
            }
        })
    }

    function getArrivals() {
        $.ajax({
            type: "post",
            url: "scripts/gettowns.php",
            success: function(a){
                var b = $.parseJSON(a);
                $('#arrivals').html(""), $.each(b,function (a,b) {
                        $('#arrivals').append('<option value="' + b.Id + '">' + b.Name + ', ' + b.Province + '</option>');
                })
            }
        })
    }

    getDepartures(), getArrivals();
})