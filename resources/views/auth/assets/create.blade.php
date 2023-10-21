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
              <h1 class="m-0">{{ isset($asset->id) ? 'Update Assets' : 'Add Assets' }}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @isset($asset->id)

        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Assets Form</h3>
                    <a href="/my_assets" class="btn btn-sm btn-dark float-right">Assets</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="/my_assets/{{ $asset->id }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <label for="exampleInputTitle">Asset Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $asset->asset_name }}" readonly autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputDescription">Asset Description</label>
                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $asset->description }}" required autocomplete="description">

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Asset</label>
                            <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file">
                                <img alt="{{ $asset->asset_name }}" src="{{ asset($asset->path) }}" width="100" height="100">
                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputwidth">Asset Width</label>
                                    <input id="width" type="number" min="1" class="form-control @error('width') is-invalid @enderror" name="width" value="{{ $asset->width }}" required autocomplete="width">

                                    @error('width')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputheight">Asset Height</label>
                                    <input id="height" type="number" min="1" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ $asset->height }}" required autocomplete="height">

                                    @error('height')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </section>

    @else

        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Assets Form</h3>
                    <a href="/my_assets" class="btn btn-sm btn-dark float-right">Assets</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="/my_assets" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <label for="exampleInputTitle">Asset Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputDescription">Asset Description</label>
                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Asset</label>
                            <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" required>

                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputwidth">Asset Width</label>
                                    <input id="width" type="number" min="1" class="form-control @error('width') is-invalid @enderror" name="width" value="{{ old('width') }}" required autocomplete="width">

                                    @error('width')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputheight">Asset Height</label>
                                    <input id="height" type="number" min="1" class="form-control @error('height') is-invalid @enderror" name="height" value="{{ old('height') }}" required autocomplete="height">

                                    @error('height')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
        </section>

    @endisset


</div>

@endsection


