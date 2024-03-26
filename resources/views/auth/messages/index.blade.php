@extends('layouts.backend')

@section('title', 'The Apostolic Church-Ghana - Home Page')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Messages</h1>
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
                      <h3 class="card-title float-left align-middle">Messages</h3>
                      <a href="/message/create" class="btn btn-sm btn-dark float-right">Add Message</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 20px">#</th>
                            <th>Preacher</th>
                            <th>Title</th>
                            <th style="width: 150px">Type</th>
                            <th style="width: 150px">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($message as $key => $message)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $message->preacher }}</td>
                                <td>{{ $message->title }}</td>
                                <td>{{ $message->type }}</td>
                                {{-- <td>@if ($message->show_on_home_page === 1) Show @else Don't @endif</td> --}}
                                <td>
                                    <a href="message/{{ $message->id }}/edit" class="btn btn-sm btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                    <a href="message/{{ $message->id }}/delete" onclick="return confirm('This record will be deleted!! Are you sure?')" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></a>
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
