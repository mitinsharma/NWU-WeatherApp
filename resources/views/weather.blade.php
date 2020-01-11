@extends('layouts.app')
@section('content')
    <h2>{{$res['location']}}</h2>
    <p>Temperature: {{$res['temperature']}}</p>
    @foreach($res['forecast'] as $forecast)
        <p>Main: {{$forecast['main']}}</p>
        <p>Description: {{$forecast['description']}}</p>
        <p>Icon: {{$forecast['icon']}}</p>
    @endforeach

@endsection
