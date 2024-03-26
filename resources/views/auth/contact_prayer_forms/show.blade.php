@extends('layouts.backend')

@section('title', 'The Apostolic Church-Ghana - Prayer Request Form')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Prayer Request Form</h1>
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
                <a href="/prayer-forms" class="btn btn-sm btn-dark float-right">Back</a>
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
                        <label for="exampleInputDescription">Request Type</label>
                        <input id="name" type="text" class="form-control"  value="{{ $form->type }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDescription">Message</label>
                        <textarea class="form-control" rows="10" readonly>{{ $form->message }}</textarea>
                    </div>
                    {{-- <a href="/contact-forms/{{ $form->id }}/delete" onclick="return confirm('This record will be deleted!! Are you sure?')" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></a> --}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </section>

</div>

@endsection


