@extends('layouts.main')

@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Designations
        <small>list of designations</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="javascript:;">Designations</a></li>
        <li class="active">List Designations</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <i class="icon fa fa-check"></i> 
          {{$message}}
        </div>
      @endif
      <div class="row">
        <div class="col-xs-12">
          <div class="box-header">
              <button class="btn btn-primary" onclick="window.location='{{route('designations.create')}}'">Create New Designation</button>
          </div>
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="designations" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Designation</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Designation</th>
                  <th>Created At</th>
                  <th>Updated At</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection