@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Sliders</h1>
        </div>

        @if ($errors->any())
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
                <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="image[]">Image</label>
                        <input type="file" class="form-control pb-1" name="image[]" placeholder="Image">
                    </div>
                    <div class="form-group ">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Masukan Nama Title" value="{{ old('title') }}">
                    </div>
                    <div class="form-group ">
                        <label for="title2">Title-2</label>
                        <input type="text" class="form-control" name="title2" placeholder="Masukan Nama Title-2" value="{{ old('title2') }}">
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="place_title">Judul</label>
                                <select id="place_title" name="place_title" required class="form-control" type="hidden" >
                                    <option value="">-- Pilih Judul--</option>
                                    @foreach ($places as $place)
                                        <option value="{{ $place->id }}">
                                            {{ $place->title }}
                                        </option>
                                    @endforeach 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="place_excerpt">Excerpt</label>
                                <select id="place_excerpt" required class="form-control" type="hidden">
                                    <option value=""></option>
                                    @foreach ($places as $place)
                                        <option value="{{ $place->id }}">
                                            {{ $place->excerpt }}
                                        </option>
                                    @endforeach 
                                </select>
                            </div>
                        </div>
                    </div> --}}
                    <button type="submit" class="btn btn-primary btn-block"> Simpan</button>
                </form>
            </div>
        </div>
    </div>
    {{-- <script>
        function cek_db(){
          var id = $("#place_title").val(); 
          $.ajax({
            url : 'database/migration/', // file proses penginputan
            data : "id="+id,
          }).success(function (data){
            var json = data,
            obj = JSON.parse(json);
            $('#place_excerpt').val(obj.excerpt); 
          })
        }
    </script> --}}
<!-- /.container-fluid -->
@endsection
