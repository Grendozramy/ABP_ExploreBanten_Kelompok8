@extends('layouts.app')

@section('title', 'Category Tours')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                @foreach ($category as $item)
                <h1 class="display-3 text-white animated zoomIn">{{ $item->name }} </h1>
                <a href="{{ url('/') }}" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="{{ url('/tours', $item->slug) }}" class="h4 text-white">{{ $item->name }}</a>
                @endforeach
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
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($category as $item)
                    @foreach ($item->places as $item1)
                    @foreach ($item1->images as $item2)  
                        <div class="col">
                            <div class="card">
                                <img src="{{ $item2->image}}" width="600" height="300" class="card-img-top"
                                    alt="...">
                                <div class="card-body">
                                    <p class="text-primary mb-0 text-Secondary">
                                        {{ $item1->created_at->diffForHumans() }}
                                    </p>
                                    <a href="{{ url('/blogs', $item1->slug) }}">
                                        <h5 class="card-title">{{ $item1->title }}</h5>
                                    </a>
                                    <p class="card-text">{{ strip_tags($item1->excerpt) }}</p>
                                </div>
                            </div>
                        </div>
                       
                    @endforeach
                    @endforeach
                @endforeach
                
            </div>
            {{ $places->links() }}
        </div>
    </div>
    
        <!-- Destinasi End -->
    @endsection
