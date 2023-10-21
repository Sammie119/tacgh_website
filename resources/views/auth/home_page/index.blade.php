@extends('layouts.backend')

@section('title', 'TACCCU - Home Page')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Home Page</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          {{-- <section class="content"> --}}
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title float-left align-middle">Home Page</h3>
                      @if(get_logged_in_user_id() == 1)
                        <a href="/home-page/create" class="btn btn-sm btn-dark float-right">Add Item</a>
                      @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 20px">#</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($home as $key => $home)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $home->name }}</td>
                                <td>{{ $home->title }}</td>
                                <td>{{ substr($home->description, 0, 50) }}</td>
                                <td><img src="{{ asset(get_asset_path($home->asset_id)) }}" width="80" alt="{{ $home->title }}"></td>
                                <td>
                                    <a href="home-page/{{ $home->id }}/edit" class="btn btn-sm btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                    <a href="home-page/{{ $home->id }}/delete" onclick="return confirm('This record will be deleted!! Are you sure?')" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></a>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="10">No Data Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                  <!-- /.card -->
            </div>
          {{-- </section> --}}
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
