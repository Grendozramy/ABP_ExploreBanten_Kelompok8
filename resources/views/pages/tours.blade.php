@extends('layouts.app')

@section('title', 'Category Tours')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Tours</h1>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Destinasi Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title mb-5">
                <h5 class="position-relative d-inline-block text-primary text-uppercase">Destinasi</h5>
                <h1 class="display-5 mb-0">Banten memiliki banyak
                    destinasi yang bisa dikunjungi.</h1>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-4 pb-3">
                @foreach ($data as $item)
                    @foreach ($item->images as $item1)
                        <div class="col">
                            <div class="card">
                                <img src="{{ $item1->image}}" width="600" height="300" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <p class="text-primary mb-0 text-Secondary">
                                        {{ $item->created_at->diffForHumans() }}
                                    </p>
                                    <a href="{{ url('/blogs', $item->slug) }}">
                                        <h5 class="card-title">{{ $item->title }}</h5>
                                    </a>
                                    <p class="card-text">{{strip_tags($item->excerpt) }}</p>
                                </div>
                            </div>
                        </div>
                       

                    @endforeach
                @endforeach
            </div>
            {{ $data->links() }}
        </div>
    </div>
    
        <!-- Destinasi End -->
    @endsection
