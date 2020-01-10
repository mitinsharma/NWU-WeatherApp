<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use SebastianBergmann\Environment\Console;

class WeatherController extends Controller
{
    //
    public function index(){
        $app_id = Config::get('app.weather_app_id');
        error_log($app_id);
        return view('weather');
    }
}
