@extends('layouts.backend')

@section('title', 'TACCCU - Staff')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Staff</h1>
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
                      <h3 class="card-title float-left align-middle">Staff List</h3>
                      <a href="/staff/create" class="btn btn-sm btn-dark float-right">Add Staff</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 20px">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Contact</th>
                            <th>Position</th>
                            <th>Status</th>
                            <th>Photo</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($staffs as $key => $staff)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $staff->name }}</td>
                                <td>{{ $staff->description }}</td>
                                <td>{{ $staff->contact }}</td>
                                <td>{{ $staff->position }}</td>
                                <td>{{ $staff->is_staff_or_board }}</td>
                                <td><img src="{{ asset(get_asset_path($staff->asset_id)) }}" alt="{{ $staff->name }}" width="80"></td>
                                <td>
                                  <a href="staff/{{ $staff->id }}/edit" class="btn btn-sm btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                  <a href="staff/{{ $staff->id }}/delete" onclick="return confirm('This record will be deleted!! Are you sure?')" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></a>
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
