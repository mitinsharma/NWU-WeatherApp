@extends('layouts.app')
@section('content')
    <h2>This is a Weather App UI.</h2>
    <p>{{$forecast->name}}</p>
    @foreach($forecast->weather as $weather)
        <p>{{$weather->main}}</p>
    @endforeach
    @foreach($forecast->main as $main_key => $main_val)
        <p>{{$main_key}}: {{$main_val}}</p>
    @endforeach
    <p>Visibilty: {{$forecast->visibility}}</p>
    <p>Wind:</p>
    @foreach($forecast->wind as $wind_key => $wind_val)
        <p>{{$wind_key}}: {{$wind_val}}</p>
    @endforeach
    <p>Clouds:</p>
    @foreach($forecast->clouds as $cloud_key => $cloud_val)
        <p>{{$cloud_key}}: {{$cloud_val}}</p>
    @endforeach

@endsection
