@extends('layouts.backend')

@section('title', 'The Apostolic Church-Ghana - Gallery')

@section('content')

@push('styles')
<style type="text/css">
    .btn-circle.btn-xl {
    width: 70px;
    height: 70px;
    padding: 10px 16px;
    border-radius: 35px;
    font-size: 24px;
    line-height: 1.33;
}

.btn-circle {
    width: 30px;
    height: 30px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;
}
</style>
@endpush

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Show Gallery</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Gallery</h3>
                <a href="/galleries" class="btn btn-sm btn-dark float-right">Gallery</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputTitle">Gallery Name</label>
                    <input id="name" type="text" class="form-control" value="{{ $galleries->last()->name }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputDescription">Gallery Description</label>
                        <input id="description" type="text" class="form-control" value="{{ $galleries->last()->description }}" readonly>
                    </div>

                    <div class="row">
                        @foreach ($galleries as $gallery)
                            <div class="col-4 mt-2 mb-2">
                                <div class="form-group">
                                    <img src="{{ asset($gallery->path) }}" alt="{{ $gallery->name }}" width="300">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputDescription">Size: {{ $gallery->width }} X {{ $gallery->height }}</label>
                                    <a href="/galleries/{{ $gallery->id }}/image" onclick="return confirm('This record will be deleted!! Are you sure?')" class="btn btn-sm btn-danger ml-4"><i class="nav-icon fas fa-trash"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-primary btn-circle btn-xl float-right" onclick="window.location.href='/galleries/{{ $gallery->gallery_group }}/edit';"><i class="fas fa-plus"></i></button>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
</div>

@endsection


