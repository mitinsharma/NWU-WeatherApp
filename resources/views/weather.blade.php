@extends('layouts.app')
@section('content')
<<<<<<< Updated upstream
    <h2>{{$res['location']}}</h2>
    <p>Temperature: {{$res['temperature']}}</p>
    @foreach($res['forecast'] as $forecast)
        <p>Main: {{$forecast['main']}}</p>
        <p>Description: {{$forecast['description']}}</p>
        <p>Icon: {{$forecast['icon']}}</p>
    @endforeach

=======
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="weather-card">
                    <div class="top">
                        <div class="wrapper">
                            <h2 class="location">{{$res['location']}}</h2>
                            @foreach($res['forecast'] as $forecast)
                                <h1 class="heading">{{$forecast['main']}}</h1>
                                <p>Description: {{$forecast['description']}}</p>
                                <p>Icon: {{$forecast['icon']}}</p>
                            @endforeach
                            <p class="temp">
                                <span class="temp-value">{{ ($res['temperature'])}}</span>
                                <span class="deg">0</span>
                                <a href="javascript:;"><span class="temp-type">F</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
>>>>>>> Stashed changes
@endsection
