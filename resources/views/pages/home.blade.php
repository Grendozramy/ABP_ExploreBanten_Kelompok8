@extends('layouts.app')

@section('title', 'Explore Banten')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php $i=1; @endphp
                @foreach ($sliders as $item)
                <div class="carousel-item {{ $i=='1' ? 'active':'' }}">
                    @php $i++; @endphp
                    <img class="w-100" width="1200" height="720" src="{{ $item->image }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown">{{ $item->title }}</h4>
                            <h3 class="display-1 text-white mb-md-4 animated zoomIn">{{ $item->title2 }}</h3>
                            {{-- <a href="{{ url('/tours') }}"
                                class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Kunjungi</a> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Latest Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title mb-5">
                <h5 class="position-relative d-inline-block text-primary text-uppercase">Latest Post</h5>
                <h1 class="display-5 mb-0">Post Terbaru yang ada di sekitar Banten</h1>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($places as $item)
                @foreach ($item->images as $item1)
                <div class="col">
                    <div class="card">
                      <img src="{{ $item1->image }}" width="600" height="300" class="card-img-top" alt="...">
                      <div class="card-body">
                          <p class="text-primary mb-0 text-Secondary">{{ $item->created_at->diffForHumans() }}
                          </p>
                        <a href="{{ url('/blogs', $item->slug) }}"><h5 class="card-title">{{ $item->title }}</h5></a>
                        <p class="card-text">{{ strip_tags($item->excerpt) }}</p>
                      </div>
                    </div>
                  </div>
                @endforeach
                
            @endforeach
        </div>
    </div >
    <hr>
    <!-- Latest End -->

    <!-- headline Start -->
    <div class="container-fluid pb-5 wow fadeInUp">
        <div class="container " id='categorydown'>
            <div class="section-title mb-5">
                <h5 class="position-relative d-inline-block text-primary text-uppercase">Tours Category</h5>
            </div>
        </div>
    </div>
    @foreach ($category as $item)
    {{-- @foreach ($item->images as $item1) --}}
    <div class="container-fluid pb-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container ">
            <div class="row g-5">
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute rounded wow zoomIn" data-wow-delay="0.9s"
                            src="{{ $item->image }}" height="400px" width="400px" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title mb-4">
                        <h3 class="text-primary text-uppercase">{{ $item->name }}</h3>
                        <h1 class="display-5 mb-0">{{ $item->title }}</h1>
                    </div>
                    <h4 class="text-body fst-italic mb-4 "> {{ $item->description }}
                    </h4>
                    <a href="{{ url('/tours', $item->slug) }}" class="btn btn-primary py-3 px-5 mt-4 wow zoomIn"
                        data-wow-delay="0.6s">Kunjungi</a>
                </div>
            </div>
        </div>
    </div> 
    
    {{-- @endforeach --}}
    @endforeach
    
    <!-- headline End -->

    <!-- Maps Start -->
    <div class="container-fluid bg-appointment my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="display-5 text-white mb-4">MAPS</h1>
                        <h3 class="text-white mb-0">Jelajahi dan ajaklah orang terdekatmu  untuk
                            berlibur menikmati wisata yang ada di Banten.</h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class=" h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn"
                        data-wow-delay="0.6s">
                        <div class="col-lg-15 wow slideInUp" data-wow-delay="0.6s">
                            <div id="map" style="width:100%;height:400px;">
                                <div style="width: 100%; height: 100%" id="map">
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Maps End -->
    <script>
        var mymap = L.map('map').setView([-6.133552557978575, 106.25075786150768], 7);

         var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZ3JlbmRvIiwiYSI6ImNsMjFjM2V5NDE0OTczam10bWp5ZmFtaTIifQ.3Os-DjxRTTS2x46PU2LADQ', {
             maxZoom: 30,
             attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                 'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
             id: 'mapbox/streets-v11',
             tileSize: 512,
             zoomOffset: -1
         }).addTo(mymap);
         L.Control.geocoder().addTo(mymap);

         @foreach ($places1 as $data)
            var informasi = '<h5><?= $data->title?></h5><hr><?= $data->address?><br><hr><div class="d-grid gap-2"><a href="<?= url('/blogs', $data->slug) ?>" class="btn btn-sm btn-success btn-block text-white">Lihat Selengkapnya</a></div>'
             L.marker([<?= $data->location ?>]).addTo(mymap).bindPopup(informasi); 
         @endforeach
     </script>
     
    <!-- Reviews End -->
@endsection