@extends('layouts.app')
@section('content')
    <div class="container">
        <br/>
        <h3 class="text-sm-center">NWU Weather Information</h3>
        <br/>
        <br/>
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="weather">
                    <div class="current">
                        @if(is_array($res) && !empty($res))
                            <div class="info">
                                <div>&nbsp;</div>
                                @if(isset($res['location']))<div class="city"><small>CITY:</small> {{$res['location']}}</div>@endif
                                @if(isset($res['temperature']))<div class="temp">{{ $res['temperature']}}&deg; <small>F</small></div>@endif
                                @if(isset($res['windSpeed']))<div class="wind"><small>WIND:</small> {{$res['windSpeed']}} mph</div>@endif
                                <div>&nbsp;</div>
                            </div>
                            <div class="icon">
                                @foreach($res['forecast'] as $forecast)
                                    @if(isset($forecast['icon']))
                                        <img src="http://openweathermap.org/img/wn/{{$forecast['icon']}}@2x.png" title="@if(isset($forecast['description'])){{$forecast['description']}}@endif" alt="@if(isset($forecast['description'])){{$forecast['description']}}@endif">
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <div class="info">
                                <small>Sorry, Weather information is not available.</small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
