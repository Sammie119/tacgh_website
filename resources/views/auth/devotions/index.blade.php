@extends('layouts.backend')

@section('title', 'The Apostolic Church-Ghana - Posts')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Devotions</h1>
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
                      <h3 class="card-title float-left align-middle">Devotions List</h3>
                      <a href="/devotions/create" class="btn btn-sm btn-dark float-right">Add Devotion</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 20px">#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th style="width: 150px">Date</th>
                            <th style="width: 150px">Status</th>
                            <th style="width: 150px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $key => $post)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ date_format(date_create($post->d_date),"F j, Y") }}</td>
                                <td>
                                    @if ($post->status == 0)
                                        <span class="badge bg-danger">Inactive</span>
                                    @else
                                        <span class="badge bg-success">Active</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="/devotions/{{ $post->id }}/edit" class="btn btn-sm btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                    <a href="devotions/{{ $post->id }}/delete" onclick="return confirm('This record will be deleted!! Are you sure?')" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></a>
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
