@extends('layouts.backend')

@section('title', 'The Apostolic Church-Ghana - Carousel')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Carousel</h1>
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
                      <h3 class="card-title float-left align-middle">Carousel Page</h3>
                      @if(get_logged_in_user_id() == 1)
                        <a href="/carousels/create" class="btn btn-sm btn-dark float-right">Add Item</a>
                      @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 20px">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Post</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($carousels as $key => $carousel)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $carousel->name }}</td>
                                <td>{{ substr($carousel->description, 0, 50) }}</td>
                                <td><img src="{{ asset('public/'.get_asset_path($carousel->asset_id)) }}" width="80" alt="{{ $carousel->title }}"></td>
                                <td>{{ substr(get_posts_single($carousel->post_id)['title'], 0, 50) }}</td>
                                <td>
                                    <a href="carousels/{{ $carousel->id }}/edit" class="btn btn-sm btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                    <a href="carousels/{{ $carousel->id }}/delete" onclick="return confirm('This record will be deleted!! Are you sure?')" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></a>
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
