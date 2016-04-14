$(document).ready(function(){
    var SPMaskBehavior = function (val) {
	    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
	    onKeyPress: function(val, e, field, options) {
	        field.mask(SPMaskBehavior.apply({}, arguments), options);
	    }
    };

    $('.bt').mask(SPMaskBehavior, spOptions);

    var map;
    var marker;
    function initialize() {
        var latlng = new google.maps.LatLng(-20.452215, -54.593438);
        var mapOptions = {
            center: latlng,
            zoom: 16,
        };
        map = new google.maps.Map(document.getElementById('map-canvas'),mapOptions);
        marker = new google.maps.Marker({
            title: "Pizzaria PizzTOP",
            map: map,
            draggable: true,
        });
 
        marker.setPosition(latlng);
    }
    google.maps.event.addDomListener(window, 'load', initialize);

});

