@extends('layouts.app')

@section('title', 'Maps')

@section('content')
    <!-- Maps Start -->
    @foreach ($items as $data)
    <div class="container-fluid my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="section-title mb-3">
                <h5 class="position-relative d-inline-block text-primary text-uppercase">Maps</h5>
                <h3 class="display-5 mb-3">Rute menuju lokasi wisata {{ $data->address }}</h3>
                <h6>silahkan klik <img src="{{ asset('frontend')}}/img/logo/direction.png" height="20px"> untuk menemukan tempat lokasi anda berada, selanjutnya klik didekat lokasi tempat anda - lalu pilih 
                    <img src="{{ asset('frontend')}}/img/logo/start.png" height="20px"> dan terakhir klik lokasi wisata <img src="{{ asset('frontend')}}/img/logo/marker.png" height="20px"> lalu pilih 
                    <img src="{{ asset('frontend')}}/img/logo/start2.png" height="20px"> untuk menemukan rute wisata dipilih.</h6> 
            </div>
            <div id="map" style="width:100%;height:400px;">
                <div style="width: 100%; height: 100%" id="map">
                </div>
            </div>
        </div>
    </div>
    @endforeach
   
    <!-- Maps End -->
    <script>
        var mymap = L.map('map').setView([-6.133552557978575, 106.25075786150768], 9);

        function button(label, container) {
            var btn = L.DomUtil.create('button', '', container);
            btn.setAttribute('type', 'button');
            btn.innerHTML = label;
            return btn;
        }

         var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZ3JlbmRvIiwiYSI6ImNsMjFjM2V5NDE0OTczam10bWp5ZmFtaTIifQ.3Os-DjxRTTS2x46PU2LADQ', {
             maxZoom: 50,
             attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                 'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
             id: 'mapbox/streets-v11',
             tileSize: 512,
             zoomOffset: -1
         }).addTo(mymap);
         var icon1 = L.icon({
            iconUrl:'{{ asset('frontend')}}/img/logo/marker.png',
            iconSize: [38, 45],
         });
         L.control.locate().addTo(mymap);

         @foreach ($items as $data)
         var control = L.Routing.control({
            waypoints: [
                L.latLng(-6.035818516556057, 106.15401379712519),
                L.latLng(<?= $data->location ?>)
             
            ],
            routeWhileDragging: true,
            geocoder: L.Control.Geocoder.nominatim(),
            showAlternatives: true,
            reverseWaypoints: true,
            altLineOptions: {
            styles: [
                    {color: 'black', opacity: 0.15, weight: 9},
                    {color: 'white', opacity: 0.8, weight: 6},
                    {color: 'blue', opacity: 0.5, weight: 2}
                ]
	        },
            }).addTo(mymap);
            mymap.on('click', function(e) {
                var container = L.DomUtil.create('div'),
                    startBtn = button('Start from this location', container),
                    destBtn = button('Go to this location', container);

                L.DomEvent.on(startBtn, 'click', function() {
                    control.spliceWaypoints(0, 1, e.latlng);
                    mymap.closePopup();
                });

                L.DomEvent.on(destBtn, 'click', function() {
                    control.spliceWaypoints(control.getWaypoints().length - 1, 1, e.latlng);
                    mymap.closePopup();
            });
                L.popup()
                    .setContent(container)
                    .setLatLng(e.latlng)
                    .openOn(mymap);
            });
            (function() {
    'use strict';

    L.Routing.routeToGeoJson = function(route) {
        var wpNames = [],
            wpCoordinates = [],
            i,
            wp,
            latLng;

        for (i = 0; i < route.waypoints.length; i++) {
            wp = route.waypoints[i];
            latLng = L.latLng(wp.latLng);
            wpNames.push(wp.name);
            wpCoordinates.push([latLng.lng, latLng.lat]);
        }

        return {
            type: 'FeatureCollection',
            features: [
                {
                    type: 'Feature',
                    properties: {
                        id: 'waypoints',
                        names: wpNames
                    },
                    geometry: {
                        type: 'MultiPoint',
                        coordinates: wpCoordinates
                    }
                },
                {
                    type: 'Feature',
                    properties: {
                        id: 'line',
                    },
                    geometry: L.Routing.routeToLineString(route)
                }
            ]
        };
    };

    L.Routing.routeToLineString = function(route) {
        var lineCoordinates = [],
            i,
            latLng;

        for (i = 0; i < route.coordinates.length; i++) {
            latLng = L.latLng(route.coordinates[i]);
            lineCoordinates.push([latLng.lng, latLng.lat]);
        }

        return {
            type: 'LineString',
            coordinates: lineCoordinates
        };
    };
})();


control.on('routesfound', function(e) {
    console.log(L.Routing.routeToGeoJson(e.routes[0]));
});

L.Routing.errorControl(control).addTo(mymap);

            L.marker([<?= $data->location ?>], {icon: icon1}).addTo(mymap); 
        @endforeach
     </script>
@endsection