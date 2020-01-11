@extends('layouts.app')
@section('content')
    <h2></h2>
    <p>Temperature: {{ ($res['temperature'])}}</p>
    @foreach($res['forecast'] as $forecast)
        <p>Main: {{$forecast['main']}}</p>
        <p>Description: {{$forecast['description']}}</p>
        <p>Icon: {{$forecast['icon']}}</p>
    @endforeach

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="weather-card">
                    <div class="top">
                        <div class="wrapper">
                            <h1 class="heading">Clear night</h1>
                            <h3 class="location">{{$res['location']}}</h3>
                            <p class="temp">
                                <span class="temp-value">20</span>
                                <span class="deg">0</span>
                                <a href="javascript:;"><span class="temp-type">C</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
