@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel-heading">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
            <br>
            <h3>Your address</h3>
                
            <h4>{{ $user->address}} <a href="{{route('users.edit',$user)}}" class="btn btn-success" style="margin-left:9cm">Update</a></h4> 
            <br/>
            @if(session('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>     
                @endif
            <table class="table">
                <thead>
                    <tr>
                        <th><h3>Phone numbers</h3></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($phones as $phone)
                    <tr>
                        <td scope="row">{{$phone->phone}}</td>
                        <td><a href="{{route('phones.edit',$phone)}}" class="btn btn-success">Update</a>
                        </td>
                        <td>
                        {!! Form::open(['route'=> ['phones.destroy',$phone], 'method'=>'delete']) !!}
                        {!! Form::submit('Delete', ['class'=> "btn btn-danger"]) !!}                        
                        {!! Form::close() !!}
                    </td>
                    </tr>
            @empty
                <div class="alert alert-info"> No phones yet..!!</div>
            @endforelse 
        </tbody>
    </table>
    

        </div>
    </div>
</div>
@endsection
