@extends('cars/master')

@section('content')

  <div class="row">
    <div class="col-md-12">
      
      <a href="{{url('/')}}" class="pull-right"><i class="icon-chevron-sign-left"></i> Back</a>
      <div class="col-md-8 col-md-offset-2" >
        <form method="POST" action="/car" role="form" enctype="multipart/form-data">
         {!! csrf_field() !!}
          <div class="row">
              <div class="form-group col-md-6 {{ ($errors->has('name')) ? 'has-error' : ''}}">
                  <label>Car Name</label>
                  <input type="text" class="form-control" name="name" id="nameofcar"
                             placeholder="Name of Car" value="{{ old('name') }}">
                  @if($errors->has('name'))
                      <span class="help-block">{{ $errors->first('name') }}</span>
                  @endif
              </div>
          </div>
          <div class="row">
              <div class="form-group col-md-6 {{ ($errors->has('color')) ? 'has-error' : ''}}">
                  <label>Car Color</label>
                  <input type="text" class="form-control" name="color" id="carcolor"
                             placeholder="Car Color" value="{{ old('color') }}">
                  @if($errors->has('color'))
                      <span class="help-block">{{ $errors->first('color') }}</span>
                  @endif
              </div>
          </div>
          <div class="row">
            <div class="col-md-2">
                  <button type="submit" class="btn btn-warning ">SAVE</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@stop 