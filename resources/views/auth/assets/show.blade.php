@extends('layouts.backend')

@section('title', 'TACCCU - Assets')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Show Asset</h1>
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
                <h3 class="card-title">Asset</h3>
                <a href="/my_assets" class="btn btn-sm btn-dark float-right">Assets</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputTitle">Asset Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $asset->asset_name }}" required autocomplete="name" autofocus>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputDescription">Asset Description</label>
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $asset->description }}" required autocomplete="description">
                    </div>

                    <div class="form-group">
                        <img src="{{ asset($asset->path) }}" alt="{{ $asset->asset_name }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputDescription">Size: {{ $asset->width }} X {{ $asset->height }}</label>
                    </div>
                    <a href="/my_assets/{{ $asset->id }}/delete" onclick="return confirm('This record will be deleted!! Are you sure?')" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></a>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>
</div>
    
@endsection


