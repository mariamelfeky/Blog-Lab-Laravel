
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
{!! Form::open(['route'=> 'contacts.store']) !!}

<div class="form-group text-center">
  <label for="">New contact</label>
  {{-- {!! Form::select('contact', $contacts, null, ['placeholder'=> 'your new contact']) !!} --}}
  {!! Form::text('id', null, ['class'=> 'form-control', 'placeholder'=> 'your new contact']) !!}
  <br/>
  {!! Form::submit('Add', ['class'=>'btn btn-primary']) !!} 
</div>
{!! Form::close() !!}
@endsection

