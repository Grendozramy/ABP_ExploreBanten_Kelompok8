@extends('layouts.app')

@section('title', 'Maps')

@section('content')
    <!-- Maps Start -->
    <div class="container-fluid my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="section-title mb-5">
                <h5 class="position-relative d-inline-block text-primary text-uppercase">Maps</h5>
                <h1 class="display-5 mb-0">Semua data wisata Banten</h1>
            </div>
            <div id="map" style="width:100%;height:400px;">
                <div style="width: 100%; height: 100%" id="map">
                </div>
            </div>
        </div>
    </div>
    <!-- Maps End -->
    <script>
        var mymap = L.map('map').setView([-6.133552557978575, 106.25075786150768], 9);

         var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZ3JlbmRvIiwiYSI6ImNsMjFjM2V5NDE0OTczam10bWp5ZmFtaTIifQ.3Os-DjxRTTS2x46PU2LADQ', {
             maxZoom: 30,
             attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                 'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
             id: 'mapbox/streets-v11',
             tileSize: 512,
             zoomOffset: -1
         }).addTo(mymap);

         var icon1 = L.icon({
            iconUrl:'{{ asset('frontend')}}/img/logo/marker.png',
            iconSize: [30, 40],
         });

         @foreach ($places as $data)
            var informasi = '<h5><?= $data->title?></h5><hr><?= $data->address?><br><hr><div class="d-grid gap-2"><a href="<?= url('/blogs', $data->slug) ?>" class="btn btn-sm btn-success btn-block text-white">Lihat Selengkapnya</a></div>'
             L.marker([<?= $data->location ?>], {icon:icon1}).addTo(mymap).bindPopup(informasi); 
         @endforeach
     </script>
@endsection