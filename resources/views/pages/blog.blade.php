@extends('layouts.app')

@section('title', 'Blog Places')

@section('content')
     <!-- Hero Start -->
     <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Blogs</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Blogs</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->

 <!-- Page content-->
 <div class="container" style="margin-top: 150px">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <article>
                <!-- Post header-->
                <header class="mb-4">
                    @foreach ($items as $item)
                        <!-- Post title-->
                    <h1 class="fw-bolder mb-1">{{ $item->title }}</h1>
                    <!-- Post meta content-->
                    <div class="text-muted fst-italic mb-2">Posted on {{ $item->created_at->format('d M, Y')}}</div>
                    <!-- Post categories-->
                    {{-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Pemandangan</a>
                    <a class="badge bg-secondary text-decoration-none link-light" href="#!">Pantai</a> --}}
                    @endforeach
                </header>
                @foreach ($items as $item)
                @foreach ($item->images as $item1)
                <!-- Preview image figure-->
                <figure class="mb-4"><img class="img-fluid rounded" src="{{ $item1->image }}" width="900" height="100" alt="..." /></figure>
                <!-- Post content-->
                <section class="mb-5">
                    <h2 class="fw-bolder mb-4 mt-5 text-start">Tentang Wisata</h2>
                    <p class="fs-5 mb-4">{!! $item ->description !!}</p>
                </section>
            </article>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">MAPS</div>
                <div class="card-body">    
                    <!-- Preview image figure-->
                    <div id="map" style="width:100%;height:400px;">
                        <div style="width: 100%; height: 100%" id="map">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 mb-2">
                @foreach ($items as $item)
                    <a class="float-end btn btn-primary btn-block btn-md" href="{{ url('/maps', $item->location) }}"><i class="fa fa-location-arrow"></i> OPEN DIRECTION</a></div>
                 @endforeach
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Informasi Wisata</div>
                <div class="card-body">
                    <h5>Alamat</h6>
                    <p>{{ $item ->address}}</p>
                    <h5>Jam Operasi</h6>
                    <p>{{ $item ->office_hours}}</p>
                    <h5>Phone</h6>
                    <p>{{ $item ->phone}}</p>
                    <h5>Website</h6>
                    <p>{{ $item ->website}}</p>
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    @foreach ($items as $data)
    var mymap = L.map('map').setView([<?= $data->latitude ?>, <?= $data->longitude ?>], 8);
    @endforeach
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
     @foreach ($items as $data)
            var informasi = '<h6><?= $data->title?></h6><hr><?= $data->address?><br>'
             L.marker([<?= $data->location ?>], {icon:icon1}).addTo(mymap).bindPopup(informasi).openPopup();; 
         @endforeach
 </script>
@endsection