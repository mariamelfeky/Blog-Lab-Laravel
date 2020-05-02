
@extends('layouts.app')
@section('content')
{!! Form::model($user, ['route'=> ['users.update',$user], 'method'=> 'PUT']) !!}

<div class="form-group text-center">
  <label for="">New address</label>
  {!! Form::text('address', null, ['class'=> 'form-control', 'placeholder'=> 'your address']) !!}
  <br/>
  {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!} 
</div>
{!! Form::close() !!}
@endsection