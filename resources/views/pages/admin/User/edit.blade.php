@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit User (Admin) {{ $item ->name }}</h1>
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
            <form action="{{ route('user.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="name">Full Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukan Full Name"
                                value="{{ $item->name }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group ">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Masukan Email"
                                value="{{ $item->email }}">
                        </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group ">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukan Password"
                            value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group ">
                        <label for="password_confirmation">Password Konfirmasi</label>
                        <input type="password" class="form-control" name="password_confirmation"  required placeholder="Masukan Password"
                            value="">
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group ">
                        <label for="roles"></label>
                        <input type="hidden" class="form-control" name="roles" readonly placeholder="Masukan Password"
                            value="ADMIN">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block"> Ubah</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection