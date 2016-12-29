@extends('layouts.main')

@section('content')
  <div class="content-wrapper">
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
    <section class="content">
      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
         <i class="icon fa fa-check"></i>
          {{$message}}
        </div>
      @endif
       @if ($message = Session::get('error'))
        <div class="alert alert-danger bg-red-active alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <i class="icon fa fa-ban"></i> {{$message}}
              </div>
      @endif  
      <div class="row">
        <div class="col-xs-12">
          <div class="box-header">
              <button class="btn btn-primary" onclick="window.location='{{route('designations.create')}}'">Create New Designation</button>
          </div>
          <div class="box">
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
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
