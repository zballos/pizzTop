$(document).ready(function ($) {
    $('.num').mask('000000');
    var SPMaskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        spOptions = {
            onKeyPress: function (val, e, field, options) {
                field.mask(SPMaskBehavior.apply({}, arguments), options);
            }
        };

    $('.tel').mask(SPMaskBehavior, spOptions);

    $('#cidade, #bairro, #rua, #num').change(function () {
        var end = $('#rua').val() + ', ' + $('#num').val() + "-" + $('#bairro').val() + "," + $('#cidade').val();
        carregarLatLon(end);
    });

    function carregarLatLon(endereco) {
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({'address': endereco}, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var latitude = results[0].geometry.location.lat();
                    var longitude = results[0].geometry.location.lng();

                    $('#latitude').val(latitude);
                    $('#longitude').val(longitude);
                }
            }
        });
    }
});
