<div class="box-body">
  <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {!!Form::label('name','name') !!}
    {!!Form::text('name',null, ['class'=>'form-control','placeholder'=>'Enter Permisson Name']) !!}
    @if($errors->has('name'))
      <span class="help-block">
            {{ $errors->first('name') }}
      </span>
    @endif
  </div>
   <div class="form-group {{ $errors->has('route') ? ' has-error' : '' }}">
    {!!Form::label('route','Route') !!}
    {!!Form::text('route',null, ['class'=>'form-control','placeholder'=>'url ']) !!}
    @if($errors->has('route'))
      <span class="help-block">
            {{ $errors->first('route') }}
      </span>
    @endif
  </div>

  <div class="form-group {{ $errors->has('goal_title') ? ' has-error' : '' }}">
    {!!Form::label('display_name','Display Name') !!}
    {!!Form::text('display_name',null, ['class'=>'form-control','placeholder'=>'Optional Display Name']) !!}
    @if($errors->has('display_name'))
      <span class="help-block">
            {{ $errors->first('display_name') }}
      </span>
    @endif
  </div>


</div>

<style type="text/css">
  .file-actions{
      float: right;
  }
  .file-upload-indicator{
     display: none;
  }
  .select2-selection__choice{

      background-color: #3c8dbc !important;
  }
  .select2-selection__choice__remove{

      color: #FFF !important;
  }
</style>

<!-- /.box-body -->