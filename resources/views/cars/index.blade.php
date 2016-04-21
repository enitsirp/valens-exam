@extends('cars/master')

@section('content')

  <div class="row">
    <div class="col-md-12"> 
     <a href="{{url('/car/add')}}" class="pull-right"><i class="fa fa-plus-circle"></i> Add Car</a>
      <p></p>
      @if(session('success'))
            <div class="row">
                <div class="alert alert-success col-md-4 col-md-offset-4" role="alert">
                    <strong><i class="fa fa-check-square fa-2"></i> </strong> {{ session('success') }}
                </div>
            </div>
        @endif

      <div class="row">

        <div class="col-md-10 col-md-offset-1">
        <div class="row">
          
          <div class="col-md-12">
          <form method="GET" role="form" action="/">
                <a  href="/" class="btn btn-xs btn-default">Show All </a>
                <button type="submit" name="color"  value="blue" class="btn btn-xs btn-primary">Show Blue Cars</button>
                <button type="submit" name="color"  value="red" class="btn btn-xs btn-danger">Show Red Cars</button>
          </form>
          </div>

        </div>
        <p></p>
        <p></p>
      <div class="row">
        @foreach($cars as $car)
          <div class="col-md-2" style="padding:1%" id="car-{{ $car->id }}" >
           
            <form method="POST" role="form" action="/car/{{ $car->id }}">
                {!! method_field('delete') !!}
                {!! csrf_field() !!}
                <span style="color: {{ strtolower($car->color) }}"> {{ $car->name }} </span> 
               <!--  <i class="fa fa-arrow-circle-left"></i> <i class="fa fa-arrow-circle-right"></i>   --><br>
                <a href="{{url('/car/'.$car->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>  </a>
                <button type="submit" name="delete" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> </button>
            </form>
          </div>
        @endforeach
        </div>
        </div>
      </div>
    </div>
  </div>
@stop 