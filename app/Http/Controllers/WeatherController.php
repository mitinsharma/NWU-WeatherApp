<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;

class WeatherController extends Controller
{
    //
    public function index(){
        $w_url = Config::get('app.weather_url');
        $w_app_id = Config::get('app.weather_app_id');
        error_log($w_url);
        error_log($w_app_id);
        return view('weather');
    }
}
