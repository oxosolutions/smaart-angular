<div class="box-body">
  <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    {!!Form::label('name','Name') !!}
    {!!Form::text('name',null, ['class'=>'form-control','placeholder'=>'Enter Name']) !!}
    @if($errors->has('name'))
      <span class="help-block">
            {{ $errors->first('name') }}
      </span>
    @endif
  </div>

  <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
    {!!Form::label('email','Email') !!}
    {!!Form::text('email',null, ['class'=>'form-control','placeholder'=>'Enter Email']) !!}
    @if($errors->has('email'))
      <span class="help-block">
            {{ $errors->first('email') }}
      </span>
    @endif
  </div>


  <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
    {!!Form::label('username','Username') !!}
    {!!Form::text('username',null, ['class'=>'form-control','placeholder'=>'Enter username']) !!}
    @if($errors->has('username'))
      <span class="help-block">
            {{ $errors->first('username') }}
      </span>
    @endif
  </div>

  <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
    {!!Form::label('userpassword','Password') !!}
    {!!Form::password('password', ['class'=>'form-control','placeholder'=>'Enter Password','id'=>'userpassword']) !!}
    @if($errors->has('password'))
      <span class="help-block">
            {{ $errors->first('password') }}
      </span>
    @endif
  </div>

  <div class="col-md-4 form-group {{ $errors->has('profile_pic') ? ' has-error' : '' }}">
    {!!Form::label('file','Upload Pic') !!}
    {!!Form::file('profile_pic', ['class'=>'form-control','placeholder'=>'','id'=>'file-3']) !!}
    @if($errors->has('profile_pic'))
      <span class="help-block">
            {{ $errors->first('profile_pic') }}
      </span>
    @endif
  </div>

  <div style="clear: both"></div>

  <div class="{{ $errors->has('title') ? ' has-error' : '' }} input-group input-group-sm">
    {!!Form::label('token','Api Token') !!}
    {!!Form::text('token',null, ['class'=>'form-control','placeholder'=>'Enter Token','readonly'=>'readonly']) !!}
    <span class="input-group-btn">
      {{!!Form::button('Generate!',['class'=>'btn btn-info btn-flat generate-token', 'style'=> 'margin-top: 35%;']) !!}}
    </span>
    @if($errors->has('token'))
      <span class="help-block">
            {{ $errors->first('token') }}
      </span>
    @endif
  </div>
</div>
<!-- /.box-body -->
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
