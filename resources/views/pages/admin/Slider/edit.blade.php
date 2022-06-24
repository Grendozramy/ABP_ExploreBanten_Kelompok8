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
            <form action="{{ route('slider.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="image[]">Image</label>
                    <input type="file" class="form-control pb-1" name="image[]" placeholder="Image" value="{{$item->image}}">
                </div>
                <div class="form-group ">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" placeholder="Masukan Nama Title" value="{{ $item ->title }}"
                    @error('title')
                        is-invalid 
                    @enderror>
                </div>
                <div class="form-group ">
                    <label for="title2">Title-2</label>
                    <input type="text" class="form-control" name="title2" placeholder="Masukan Nama Title-2" value="{{ $item ->title2}}">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Ubah</button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection