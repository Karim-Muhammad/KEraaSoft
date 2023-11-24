@extends('layout')

@section('content')
<h1>Student Home Page</h1>

@if(true)
    <p>This only displays if true</p>
@endif

@unless(true)
    <p>This only displays if false</p>
@endunless

@for($i = 0; $i < 5; $i++)
    <p>{{ $i + 1 }}. Iteration</p>
@endfor

@foreach([['id'=> 1], ['id': 2]] as $user)
    <p>This is user {{ $user->id }}</p>
    <div>
        {{$loop->iteration}}
    </div>
@endforeach


@endsection