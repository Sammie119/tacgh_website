@extends('layouts.backend')

@section('title', 'The Apostolic Church-Ghana - Devotions')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endpush

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{ isset($post->id) ? 'Update Devotion' : 'Add Devotion' }}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @isset($post->id)

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
                    <h3 class="card-title">Devotion Form</h3>
                    <a href="/devotions" class="btn btn-sm btn-dark float-right">Devotions</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="/devotions/{{ $post->id }}">
                        @method('PUT')
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <label for="exampleInputTitle">Devotion Title</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post->title }}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputDescription">Devotion Description</label>
                                    <select id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>
                                        <option selected disabled>--Select Description--</option>
                                        <option @if ( $post->description == 'Devotion') selected @endif>Devotion</option>
                                        <option @if ( $post->description == '21 Days Fasting') selected @endif>21 Days Fasting</option>
                                    </select>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputd_date">Date</label>
                                    <input id="d_date" type="date" class="form-control @error('d_date') is-invalid @enderror" name="d_date" value="{{ $post->d_date }}" required autocomplete="d_date">

                                    @error('d_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Devotion Body</label>
                            <textarea id="summernote" class="form-control @error('body') is-invalid @enderror" name="body" cols="30" rows="10" required>{{ $post->body }}</textarea>

                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPublish">Status</label><br>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <input type="radio" name="status" id="option1" value="1" @if ($post->status == 1) checked @endif> Active
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="status" id="option2" value="0" @if ($post->status == 0) checked @endif> Inactive
                                </label>
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
                    <h3 class="card-title">Devotion Form</h3>
                    <a href="/devotions" class="btn btn-sm btn-dark float-right">Devotions</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="/devotions">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                        <label for="exampleInputTitle">Devotion Title</label>
                        <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputDescription">Devotion Description</label>
                                    <select id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>
                                        <option selected disabled>--Select Description--</option>
                                        <option>Devotion</option>
                                        <option>21 Days Fasting</option>
                                    </select>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputd_date">Date</label>
                                    <input id="d_date" type="date" class="form-control @error('d_date') is-invalid @enderror" name="d_date" value="{{ old('d_date') }}" required autocomplete="d_date">

                                    @error('d_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Devotion Body</label>
                            <textarea id="summernote" class="form-control @error('body') is-invalid @enderror" name="body" cols="30" rows="10" required>{{ old('body') }}</textarea>

                            @error('body')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPublish">Status</label><br>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-primary active">
                                    <input type="radio" name="status" id="option1" value="1" checked> Active
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="status" id="option2" value="0"> Inactive
                                </label>
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });

    $('#summernote').summernote({
        height: 300,                 // set editor height
        tabsize: 2,
    });
</script>
@endpush

