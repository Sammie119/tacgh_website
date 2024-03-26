@extends('layouts.backend')

@section('title', 'The Apostolic Church-Ghana - Users')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
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
                      <h3 class="card-title float-left align-middle">Users List</h3>
                      <a href="{{ route('register') }}" class="btn btn-sm btn-dark float-right">Add User</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 20px">#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th style="width: 150px">is Verified</th>
                            <th style="width: 150px">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $key => $user)
                              <tr>
                                  <td>{{ ++$key }}</td>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->email }}</td>
                                  <td>{{ empty($user->email_verified_at) ? 'False' : 'True'  }}</td>
                                  <td>
                                      <a href="{{ route('user_edit', ['id' => $user->id]) }}" class="btn btn-sm btn-primary"><i class="nav-icon fas fa-edit"></i></a>
                                      <a href="user_del/{{ $user->id }}" onclick="return confirm('This record will be deleted!! Are you sure?')" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></a>
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
