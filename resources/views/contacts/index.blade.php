
@extends('layouts.app')
@section('content')

<a class="btn btn-primary" href="{{ route('contacts.create')}}">Add new contact</a>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('delete'))
    <div class="alert alert-success">
        {{ session('delete') }}
    </div>
@endif
    <table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phones</th>
        </tr>
        </thead>
        <tbody>
            
            @forelse ($user->contacts()->get() as $contact) 
                <tr>
                    <td scope="row">{{$contact->name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>
                        <table>
                            @forelse ($contact->phones as $phone_num)
                                <tr>
                                    <td>{{$phone_num->phone}}</td>
                                </tr>
                                @empty
                                    <div class="alert alert-info" style="width:160px"> Not has phones yet.</div> 

                            @endforelse
                        </table>
                    </td>
                    <td>
                        {!! Form::open(['route'=> ['contacts.destroy',$contact], 'method'=>'delete']) !!}
                        {!! Form::submit('Delete', ['class'=> "btn btn-danger"]) !!}                        
                        {!! Form::close() !!}                    
                    </td>
                </tr>        
            @empty
            <div class="alert alert-info"> No contacts yet..!!</div> 

            @endforelse
        </tbody>
</table>

@endsection