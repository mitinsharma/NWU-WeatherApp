<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Log;
class WeatherController extends Controller
{
    private $w_url;
    private $w_app_id;

    //
    public function index(){
        $this->w_url = Config::get('app.weather_url');
        $this->w_app_id = Config::get('app.weather_app_id');
        Log::info('Logging..');
        $forecast = $this->getForecast();
        return view('weather')->with('forecast',$forecast);
    }

    private function getForecast(){
        $forecast = null;
        $client = new \GuzzleHttp\Client();
        $url = $this->w_url . '?q=London,uk' . '&appid=' . $this->w_app_id;
        error_log($url);
        $http = $client->get($url);
        if ($http->getStatusCode() == 200) {
            $body = $http->getBody();
            $forecast = json_decode($body);
        }
        return $forecast;
    }
}
