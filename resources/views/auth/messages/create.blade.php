@extends('layouts.backend')

@section('title', 'The Apostolic Church-Ghana - Messages')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">{{ isset($message->id) ? 'Update Message' : 'Add New Message' }}</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    @isset($message->id)

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
                    <h3 class="card-title">Message Form</h3>
                    <a href="/message" class="btn btn-sm btn-dark float-right"> Message</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="/message/{{ $message->id }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputTitle"> Preacher</label>
                            <input id="preacher" type="text" class="form-control @error('preacher') is-invalid @enderror" name="preacher" value="{{ $message->preacher }}" required autocomplete="preacher" autofocus>

                            @error('preacher')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputTitle"> Title</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $message->title }}" required autocomplete="title">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputImage"> YouTube URL</label>
                                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ $message->url }}" required autocomplete="url">

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <div class="form-group">
                                    <label for="exampleInputTitle">Type</label>
                                    <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" required>
                                        <option selected disabled>--Select--</option>
                                        <option @if ($message->type == 'Sermon') selected @endif>Sermon</option>
                                        <option @if ($message->type == 'Video') selected @endif>Video</option>
                                    </select>

                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="embed-responsive embed-responsive-16by9 mt-3">
                            <iframe class="embed-responsive-item" width="1160" height="653" src="https://www.youtube.com/embed/{{ $message->url }}?feature=oembed&wmode=opaque" allowfullscreen></iframe>
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
                    <h3 class="card-title">Message Form</h3>
                    <a href="/message" class="btn btn-sm btn-dark float-right">Message</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="POST" action="/message" enctype="multipart/form-data">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputTitle"> Preacher</label>
                            <input id="preacher" type="text" class="form-control @error('name') is-invalid @enderror" name="preacher" value="{{ old('preacher') }}" required autocomplete="preacher" autofocus>

                            @error('preacher')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputTitle"> Title</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title">

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="exampleInputurl"> YouTube URL</label>
                                <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required autocomplete="url">

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <div class="form-group">
                                    <label for="exampleInputTitle">Type</label>
                                    <select id="type" class="form-control @error('type') is-invalid @enderror" name="type" required>
                                        <option selected disabled>--Select--</option>
                                        <option>Sermon</option>
                                        <option>Video</option>
                                    </select>

                                    @error('type')
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


