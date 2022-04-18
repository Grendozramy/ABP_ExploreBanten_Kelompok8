@extends('layouts.admin')

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Places</h1>
        <a href="{{ route('place.create') }}" class="btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus fa-sm text-white">Add New</i>
        </a>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    
    <div class="row">
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">NO.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Category</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($places as $item)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $item ->title}}</td>
                        <td>{{ $item ->category->name}}</td>
                        <td>
                            <a href="{{ route('place.edit', $item->id) }}" class="btn btn-info">
                            <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('place.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('delete')
                                <button class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection