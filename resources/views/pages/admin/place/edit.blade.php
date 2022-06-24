@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Place {{ $item ->title }}</h1>
    </div>

    @if ($errors ->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('place.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="image[]">Image</label>
                    <input type="file" class="form-control pb-1" name="image[]" placeholder="Image" value="{{$item->image }}">
                </div>
                <div class="form-group ">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control" name="title" placeholder="Masukan Judul" value="{{ $item->title}}">
                </div>
                <div class="form-group ">
                    <label for="title1">Judul Kecil</label>
                    <input type="text" class="form-control" name="title1" placeholder="Masukan Judul Kecil" value="{{ $item->title1}}">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="category_id">Kategory</label>
                            <select name="category_id" required class="form-control">
                                @foreach ($categories as $category)
                                    @if (old('category_id', $item->category_id == $category->id))
                                    <option value="{{ $category ->id }}" selected>{{ $category->name }}</option> 
                                    @else
                                    <option value="{{ $category ->id }}">{{ $category->name }}</option> 
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="office_hours">Jam Kerja</label>
                            <input type="text" class="form-control" name="office_hours" placeholder="Masukan Jam Kerja" value="{{ $item->office_hours }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input id="description" type="hidden" name="description" value="{{ $item->description }}">
                    <trix-editor input="description"></trix-editor>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" placeholder="Masukan Phone" value="{{ $item->phone }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="website">Website</label>
                            <input type="text" class="form-control" name="website" placeholder="Masukan Website" value="{{ $item->website }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Masukan Alamat">{{ $item->address }}</textarea>
                </div>
                <div class="form-group ">
                    <label for="address1">Alamat Kecil</label>
                    <input type="text" class="form-control" name="address1" placeholder="Masukan Alamat Kecil" value="{{ $item->address1}}">
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="latitude">Latitude</label>
                            <input type="text" class="form-control" name="latitude" id="latitude" placeholder="Masukan Latitude"  readonly value="{{ $item->latitude }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="longitude">Longitude</label>
                            <input type="text" class="form-control" name="longitude" id="longitude" placeholder="Masukan Longitude"  readonly value="{{ $item->longitude }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" name="location" id ='location'  placeholder="Masukan Lokasi Koordinat"
                            value="{{ $item->location }}">
                    </div>
                    <div id="map" style="width:100%;height:400px;">
                        <div style="width: 100%; height: 100%" id="map">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ubah</button>
            </form>
        </div>
    </div>
</div>
{{-- maps --}}
<script>
    var mymap = L.map('map').setView([-6.133552557978575, 106.25075786150768], 9);

     var tiles = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiZ3JlbmRvIiwiYSI6ImNsMjFjM2V5NDE0OTczam10bWp5ZmFtaTIifQ.3Os-DjxRTTS2x46PU2LADQ', {
         maxZoom: 18,
         attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
             'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
         id: 'mapbox/streets-v11',
         tileSize: 512,
         zoomOffset: -1
     }).addTo(mymap);

     L.Control.geocoder().addTo(mymap);
     //get coordinate loc
     var latInput = document.querySelector("[name=latitude]")
     var lngInput = document.querySelector("[name=longitude]")
     var locationInput = document.querySelector("[name=location]")

     var curLocation = [-6.133552557978575, 106.25075786150768]

     mymap.attributionControl.setPrefix(false);

     var marker = new L.marker(curLocation, {
         draggable: 'true'
     });

     marker.on('dragend', function(event){
         var position = marker.getLatLng();
         marker.setLatLng(position,{
             draggable: 'true',
         }). bindPopup(position).update();
         $("#latitude").val(position.lat)
         $("#longitude").val(position.lng)
         $("#location").val(position.lat + ',' + position.lng);
         
     });
     mymap.addLayer(marker);

     mymap.on('click', function(e){
         var lat = e.latlng.lat;
         var lng = e.latlng.lng;
         if (!marker) {
             marker = L.marker(e.latlng).addTo(mymap);
         } else {
             marker.setLatLng(e.latlng)
         }
         latInput.value = lat;
         lngInput.value = lng;
         locationInput.value = lat + ',' +lng;
     });
 </script>

<!-- /.container-fluid -->
@endsection