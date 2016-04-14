$(document).ready(function(){
    var map;
    var destino;
    var origem;
    var directionsService = new google.maps.DirectionsService();

    function initialize() {
        directionsDisplay = new google.maps.DirectionsRenderer();
        var pizzTop = new google.maps.LatLng(-20.452215, -54.593438);
        var latlng = new google.maps.LatLng($("#lat").val(), $("#lon").val());
        var mapOptions = {
            center: latlng,
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
        
        destino = new google.maps.Marker({
            title: "Cliente",
            map: map,
            draggable: true,
        });
        origem = new google.maps.Marker({
            title: "PizzTOP",
            map: map,
            draggable: true,
        });
        // seta os pontos no mapa
        //destino.setPosition(latlng);
        //origem.setPosition(pizzTop);
        
        // inicio da marcação da rota
        var request = { 
            origin: pizzTop, // origem
            destination: latlng, // destino
            travelMode: google.maps.TravelMode.DRIVING // meio de transporte, nesse caso, de carro
        };
        
        directionsService.route(request, function(result, status) {
            if (status == google.maps.DirectionsStatus.OK) { // Se deu tudo certo
                directionsDisplay.setDirections(result); // Renderizamos no mapa o resultado
            }
        });
        directionsDisplay.setMap(map);

        // calculando distancia
        var service = new google.maps.DistanceMatrixService();
        //executar o DistanceMatrixService
        WALKING = {
            origins: [pizzTop],
            destinations: [latlng],
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.METRIC,
            avoidHighways: false,
            avoidTolls: false
        };
        service.getDistanceMatrix(WALKING , callback);
    }
    function callback(response, status) {
        var dist = response.rows[0].elements[0].distance.text;
        $('#distancia').html(dist);
        var x = response.rows[0].elements[0].distance.value;
        console.log(x);
        if((x >= 0) && (x <= 5000)){
            $('#frete').html("R$ 2,00");
        }
        else if(x >= 5001 && x <= 10000){
            $('#frete').html("R$ 3,00");
        }
        if(x >= 10001 && x <= 15000){
            $('#frete').html("R$ 4,00");
        }
        if(x >= 15001 && x <= 20000){
            $('#frete').html("R$ 5,00");
        }
        if(x > 20000){
            $('#frete').html("R$ 7,00");
        }
    }
    google.maps.event.addDomListener(window, 'load', initialize);

});
