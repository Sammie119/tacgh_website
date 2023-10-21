@extends('layouts.backend')

@section('title', 'TACCCU - Carousels')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{ isset($carousel->id) ? 'Update Carousels' : 'Add Carousels' }}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @isset($carousel->id)

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
                <h3 class="card-title">Carousels Form</h3>
                <a href="/carousels" class="btn btn-sm btn-dark float-right">Carousels</a>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="/carousels/{{ $carousel->id }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputTitle"> Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $carousel->name }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputImage"> Image</label>
                        <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file">
                        <img alt="{{ $carousel->name }}" src="{{ asset(get_asset_path($carousel->asset_id)) }}" width="100" height="100">
                        @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputpost">Related Post</label>
                        <select id="post_id" class="form-control @error('post_id') is-invalid @enderror" name="post_id" required>
                            <option selected disabled>--Select--</option>
                            @foreach (get_posts() as $post)
                                <option @selected($carousel->post_id == $post['id']) value="{{ $post['id'] }}">{{ $post['title'] }}</option>
                            @endforeach
                        </select>

                        @error('post_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputDescription">Description</label>
                        <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ $carousel->description }}" required autocomplete="description">

                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
                    <h3 class="card-title">Carousels Form</h3>
                    <a href="/carousels" class="btn btn-sm btn-dark float-right">Carousels</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="/carousels" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <label for="exampleInputTitle"> Name</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputImage"> Image</label>
                            <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" required>

                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputpost">Related Post</label>
                            <select id="post_id" class="form-control @error('post_id') is-invalid @enderror" name="post_id" required>
                                <option selected disabled>--Select--</option>
                                @foreach (get_posts() as $post)
                                    <option value="{{ $post['id'] }}">{{ $post['title'] }}</option>
                                @endforeach
                            </select>

                            @error('post_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputDescription">Description</label>
                            <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description">

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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



