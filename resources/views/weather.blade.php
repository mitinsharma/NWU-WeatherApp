@extends('layouts.app')
@section('content')
    <h2></h2>
    <p>Temperature: </p>


    <div class="container">
        <div class="row">
            <div class="col">
                <div class="weather-card">
                    <div class="top">
                        <div class="wrapper">
                            <h1 class="heading">{{$res['location']}}</h1>
                            <h3 class="location"></h3>
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

@endsection
