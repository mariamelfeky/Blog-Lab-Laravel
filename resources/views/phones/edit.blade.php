
@extends('layouts.app')
@section('content')
@if($errors->any())
<div class="alert alert-danger">
  <ul>
  @foreach ($errors->all() as $message )
    <li>{{ $message }}</li>
  @endforeach
  </ul>
</div>
@endif
{!! Form::model($phone, ['route'=> ['phones.update',$phone], 'method'=> 'PUT']) !!}

<div class="form-group text-center">
  <label for="">phone</label>
  {!! Form::text('phone', null, ['class'=> 'form-control', 'placeholder'=> 'your new phone']) !!}
  <br/>
  {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!} 
</div>
{!! Form::close() !!}
@endsection