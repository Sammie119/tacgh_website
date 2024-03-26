@extends('layouts.backend')

@section('title', 'The Apostolic Church-Ghana - Contact Form')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Contact Form</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->

    <section class="content">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                <h3 class="card-title">Form</h3>
                <a href="/testimony-forms" class="btn btn-sm btn-dark float-right">Back</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="form-group">
                    <label for="exampleInputTitle">Name</label>
                    <input id="name" type="text" class="form-control"  value="{{ $form->name }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputDescription">Contact</label>
                        <input id="name" type="text" class="form-control"  value="{{ $form->contact }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDescription">Message</label>
                        <textarea class="form-control" rows="10" readonly>{{ $form->message }}</textarea>
                    </div>
                    @if ($form->is_read === 1)
                        <a href="/testimony-forms/edit/{{ $form->id }}" onclick="return confirm('Are you sure you want to remove this Testimony from the home page')" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i>  Remove Testimony</a>
                    @else
                        <a href="/testimony-forms/edit/{{ $form->id }}" onclick="return confirm('Are you sure you want to show this Testimony on the home page')" class="btn btn-sm btn-primary"><i class="nav-icon fas fa-eye"></i>  Show Testimony</a>
                    @endif

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>

</div>

@endsection


