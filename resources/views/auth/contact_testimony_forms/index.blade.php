@extends('layouts.backend')

@section('title', 'The Apostolic Church-Ghana - Testimony Form')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Testimony Form</h1>
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
                      <h3 class="card-title float-left align-middle">Testimonies List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 20px">#</th>
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Status</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($forms as $key => $form)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $form->name }}</td>
                                <td>{{ $form->contact }}</td>
                                <td>
                                  @if ($form->is_read == 0)
                                    <span class="badge bg-danger">Not Showing</span>
                                  @else
                                    <span class="badge bg-success">Showing</span>
                                  @endif
                                </td>
                                <td>
                                  <a href="/testimony-forms/{{ $form->id }}" class="btn btn-sm btn-info"><i class="nav-icon fas fa-edit"></i></a>
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
