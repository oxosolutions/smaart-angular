@extends('layouts.main')

@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         Permisson Form
        <small>Assign Permisson
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{{url('permisson')}}"> Permisson</a></li>
        <li class="active">Assign Permisson</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Assign Permisson</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
              {!! Form::model($model, ['method' => 'Post','route'=>['setting.update', $model->id], 'files'=>true]) !!}
                @include('setting._edit_form')
              <div class="box-footer">
                {!! Form::submit('Save Changes', ['class' => 'btn btn-primary']) !!}
              </div>
              {!! Form::close() !!}

          </div>
          <!-- /.box -->

               

        </div>
        <!--/.col (left) -->
        
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

  </div>
@endsection 