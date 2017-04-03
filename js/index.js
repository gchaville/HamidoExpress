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
                    var line = '<tr class="travel" value="'+b.Id+'">' + '<th scope="row">'+ b.Date +'</th>' + '<td>'+ b.Price + ' $</td>' + '<td>';

                    for ($i = 1; $i <= b.Places_Available; $i++) {
                        line += '<img alt="hello" src="images/stickman.png" width="30" height="30">';
                    }

                    line += '</td>' +
                        '<td class="preferences" id="'+b.Id+'"></td>' +
                        '<td><button type="button" id="'+b.Id+'" class="btn btn-primary booking-button">Réserver</button></td>' +
                        '</tr>';

                    $('.departures').append(line);

                    if (b.Places_Available == 0)
                        $('#'+b.Id).addClass('disabled');

                    $(".booking-button").click(function()
                    {
                        //console.log($('.departure-search').serializeArray());
                        $.ajax({
                            type: "post",
                            url: "scripts/addbooking.php",
                            data: {travelid: $(this).attr('id')},
                            success: function (a) {
                                console.log(a);
                            }
                        })
                    });
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