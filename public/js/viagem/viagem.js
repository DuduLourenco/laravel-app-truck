var place;
var dest = {
    lat: 0,
    lng: 0
};
var pos = {
    lat: 0,
    lng: 0
};
var map, directionsRenderer, directionsService;
var directionsRenderer;
var directionsService;

function initMap() {
    directionsRenderer = new google.maps.DirectionsRenderer;
    directionsService = new google.maps.DirectionsService;
    map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: -23.96,
            lng: -46.33
        },
        zoom: 8,
        styles: [{
            "elementType": "geometry",
            "stylers": [{
                "color": "#1d2c4d"
            }]
        }, {
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#8ec3b9"
            }]
        }, {
            "elementType": "labels.text.stroke",
            "stylers": [{
                "color": "#1a3646"
            }]
        }, {
            "featureType": "administrative.country",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#4b6878"
            }]
        }, {
            "featureType": "administrative.land_parcel",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#64779e"
            }]
        }, {
            "featureType": "administrative.province",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#4b6878"
            }]
        }, {
            "featureType": "landscape.man_made",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#334e87"
            }]
        }, {
            "featureType": "landscape.natural",
            "elementType": "geometry",
            "stylers": [{
                "color": "#023e58"
            }]
        }, {
            "featureType": "poi",
            "elementType": "geometry",
            "stylers": [{
                "color": "#283d6a"
            }]
        }, {
            "featureType": "poi",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#6f9ba5"
            }]
        }, {
            "featureType": "poi",
            "elementType": "labels.text.stroke",
            "stylers": [{
                "color": "#1d2c4d"
            }]
        }, {
            "featureType": "poi.park",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#023e58"
            }]
        }, {
            "featureType": "poi.park",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#3C7680"
            }]
        }, {
            "featureType": "road",
            "elementType": "geometry",
            "stylers": [{
                "color": "#304a7d"
            }]
        }, {
            "featureType": "road",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#98a5be"
            }]
        }, {
            "featureType": "road",
            "elementType": "labels.text.stroke",
            "stylers": [{
                "color": "#1d2c4d"
            }]
        }, {
            "featureType": "road.highway",
            "elementType": "geometry",
            "stylers": [{
                "color": "#2c6675"
            }]
        }, {
            "featureType": "road.highway",
            "elementType": "geometry.stroke",
            "stylers": [{
                "color": "#255763"
            }]
        }, {
            "featureType": "road.highway",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#b0d5ce"
            }]
        }, {
            "featureType": "road.highway",
            "elementType": "labels.text.stroke",
            "stylers": [{
                "color": "#023e58"
            }]
        }, {
            "featureType": "transit",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#98a5be"
            }]
        }, {
            "featureType": "transit",
            "elementType": "labels.text.stroke",
            "stylers": [{
                "color": "#1d2c4d"
            }]
        }, {
            "featureType": "transit.line",
            "elementType": "geometry.fill",
            "stylers": [{
                "color": "#283d6a"
            }]
        }, {
            "featureType": "transit.station",
            "elementType": "geometry",
            "stylers": [{
                "color": "#3a4762"
            }]
        }, {
            "featureType": "water",
            "elementType": "geometry",
            "stylers": [{
                "color": "#0e1626"
            }]
        }, {
            "featureType": "water",
            "elementType": "labels.text.fill",
            "stylers": [{
                "color": "#4e6d70"
            }]
        }]
    });
    infoWindow = new google.maps.InfoWindow;

    directionsRenderer.setMap(map);

    initAutocomplete();
}

function initAutocomplete() {

    var destino = document.getElementById("dsDestino");
    var searchBoxDestino = new google.maps.places.SearchBox(destino);

    var origem = document.getElementById("dsOrigem");
    var searchBoxOrigem = new google.maps.places.SearchBox(origem);

    map.addListener('bounds_changed', function () {
        searchBoxDestino.setBounds(map.getBounds());
    });

    var markers = [];

    searchBoxOrigem.addListener('places_changed', function () {
        var places = searchBoxOrigem.getPlaces();

        if (places.length == 0) {
            return;
        }

        markers.forEach(function (marker) {
            marker.setMap(null);
        });
        markers = [];

        var bounds = new google.maps.LatLngBounds();

        places.forEach(function (place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }

            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            dest = {
                lat: place.geometry.location.lat(),
                lng: place.geometry.location.lng()
            };

            calculateAndDisplayRoute(window.directionsService, window.directionsRenderer);

            if (place.geometry.viewport) {

                bounds.union(place.geometry.viewport);
            } else {
                bounds.extend(place.geometry.location);
            }
        });

        map.fitBounds(bounds);
    });

    searchBoxDestino.addListener('places_changed', function () {
        var places = searchBoxDestino.getPlaces();

        if (places.length == 0) {
            return;
        }
        markers.forEach(function (marker) {
            marker.setMap(null);
        });
        markers = [];

        places.forEach(function (place) {
            if (!place.geometry) {
                console.log("Returned place contains no geometry");
                return;
            }

            var icon = {
                url: place.icon,
                size: new google.maps.Size(71, 71),
                origin: new google.maps.Point(0, 0),
                anchor: new google.maps.Point(17, 34),
                scaledSize: new google.maps.Size(25, 25)
            };

            pos = {
                lat: place.geometry.location.lat(),
                lng: place.geometry.location.lng()
            };

            calculateAndDisplayRoute(window.directionsService, window.directionsRenderer);

        });

        map.fitBounds(bounds);
    });
}

function calculateAndDisplayRoute(directionsService, directionsRenderer) {
    if (pos.lat != 0 && dest.lat != 0) {
        directionsService.route({
            origin: pos,
            destination: dest,
            travelMode: google.maps.TravelMode["DRIVING"]
        }, function (response, status) {
            if (status == 'OK') {
                directionsRenderer.setDirections(response);                
                var rota = response.routes[0].legs[0];
                var dados = "Dados: ";
                dados += "\nDe: " + rota.start_address;
                dados += "\nPara: " + rota.end_address;
                dados += "\nDistância: " + rota.distance['text'];
                dados += "\nDuração: " + rota.duration['text'];
                $("#dsDistancia").val(rota.distance['text']);
                $("#dsTempo").val(rota.duration['text']);
                window.location.href='#ancora';
                //mensagemAlerta(dados);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

}

