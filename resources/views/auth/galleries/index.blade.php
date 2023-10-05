@extends('layouts.backend')

@section('title', 'TACCCU - Gallery')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Gallery</h1>
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
                      <h3 class="card-title float-left align-middle">Gallery List</h3>
                      <a href="/galleries/create" class="btn btn-sm btn-dark float-right">Add Gallery</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 20px">#</th>
                            <th>Gallery Name</th>
                            <th>Description</th>
                            <th>Count</th>
                            <th>Group #</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($galleries as $key => $gallery)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $gallery->name }}</td>
                                <td>{{ $gallery->description }}</td>
                                <td>{{ $gallery->count }}</td>
                                <td>{{ $gallery->gallery_group }}</td>
                                <td>
                                  <a href="galleries/{{ $gallery->gallery_group }}" class="btn btn-sm btn-info"><i class="nav-icon fas fa-eye"></i></a>
                                  <a href="galleries/{{ $gallery->gallery_group }}/delete" onclick="return confirm('This record will be deleted!! Are you sure?')" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></a>
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
