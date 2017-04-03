$(document).ready(function () {

    $('.search-button').click(function() {
        if ($('#departures').val() == $('#arrivals').val())
          $('.error-search').append('<span id="helpBlock" class="help-block">Veuillez chercher un itinéraire convenable !</span>').fadeIn();
        else {
            $('.error-search').fadeOut();
            $.ajax({
                type: "post",
                url: "scripts/gettravels.php",
                data: $('.departure-search').serializeArray(),
                success: function (a) {
                    var b = $.parseJSON(a);
                    $('.departures').html(""), $.each(b, function (a, b) {
                        var line = '<tr class="travel' + b.Id + '" value="' + b.Id + '">' + '<th scope="row">' + b.Date + '</th>' + '<td>' + b.Schedule + '</td>' + '<td>' + b.Price + ' $</td>' + '<td>';

                        for ($i = 1; $i <= b.Places_Available; $i++) {
                            line += '<img alt="hello" src="images/stickman.png" width="30" height="30">';
                        }

                        line += '</td>' + '<td class="preferences">';

                        if (b.Smoking == '1')
                            line += '<img alt="hello" src="images/smoking.png" width="30" height="30">';
                        if (b.Air_Conditioning == '1')
                            line += '<img alt="hello" src="images/air.png" width="30" height="30">';
                        if (b.Large_suicase == '1')
                            line += '<img alt="hello" src="images/suitcase.png" width="30" height="30">';
                        if (b.Animals == '1')
                            line += '<img alt="hello" src="images/animals.jpg" width="30" height="30">';

                        line += '</td>' +
                            '<td><button type="button" id="' + b.Id + '" class="btn btn-primary booking-button">Réserver</button></td>' +
                            '</tr>';

                        $('.departures').append(line);

                        $(".booking-button").click(function () {
                            $.ajax({
                                type: "post",
                                url: "scripts/addbooking.php",
                                data: {travelid: $(this).attr('id')},
                                success: function (a) {
                                    $('.search-button').trigger("click");
                                }
                            })
                        });

                        if (b.Places_Available <= 0) {
                            $('#' + b.Id).hide();
                            $('.travel' + b.Id).addClass('active useless');
                        }
                    })
                }
            })
        }
    });

    $(".newtravel-form").submit(function() {
        if ($('#departures').val() == $('#arrivals').val()) {
            $('.error-search-dp').append('<span id="helpBlock" class="help-block">Veuillez entrer un itinéraire convenable !</span>').fadeIn();
            $('.error-search-ar').append('<span id="helpBlock" class="help-block">Veuillez entrer un itinéraire convenable !</span>').fadeIn();
            return false;
        }
        else {
            $('.error-search-dp').fadeOut();
            $('.error-search-ar').fadeOut();
            return true;
        }
    });

    $('.cancel-booking-button').click(function() {
        $.ajax({
            type: "post",
            url: "scripts/cancelbooking.php",
            data: {travelid: $(this).attr('id')},
            success: function (a) {
                console.log("yep");
                window.location.replace("http://localhost/HamidoExpress/userhistoric.php");
            }
        })
    });

    $('.cancel-travel-button').click(function() {
        console.log("CANCEL TRAVEL");
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