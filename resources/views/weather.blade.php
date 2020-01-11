@extends('layouts.app')
@section('content')
    <div class="container">
        <br/>
        <h2 class="text-sm-center">NWU Weather Information:</h2>
        <br/>
        <br/>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="weather">
                    <div class="current">
                        <div class="info">
                            <div>&nbsp;</div>
                            <div class="city"><small>CITY:</small> {{$res['location']}}</div>
                            <div class="temp">{{ ($res['temperature'])}}&deg; <small>F</small></div>
                            <div class="wind"><small><small>WIND:</small></small> 22 km/h</div>
                            <div>&nbsp;</div>
                        </div>
                        <div class="icon">
                            @foreach($res['forecast'] as $forecast)
                                <img src="http://openweathermap.org/img/wn/{{$forecast['icon']}}@2x.png" title="{{$forecast['description']}}">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
@endsection
