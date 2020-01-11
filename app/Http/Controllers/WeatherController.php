<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Log;
class WeatherController extends Controller
{
    private $w_url;
    private $w_app_id;
    private $weather;

    //
    public function index(){
        $res = [];
        $this->w_url = Config::get('app.weather_url');
        $this->w_app_id = Config::get('app.weather_app_id');

        $client = new \GuzzleHttp\Client();
        $url = $this->w_url . '?q=London,uk' . '&appid=' . $this->w_app_id;
        $http = $client->get($url);
        if ($http->getStatusCode() == 200) {
            $body = $http->getBody();
            $this->weather = json_decode($body,true);
            try{
                $res = array(
                    'location' => $this->getLocation(),
                    'temperature' => $this->getTemperature(),
                    'forecast' => $this->getForecast()
                );
            } catch (\Exception $e) {
                error_log($e);
            }
        }
        //return $res;
        return view('weather')->with('res',$res);
}

    protected function getLocation(){
        if(is_array($this->weather) && $this->weather!=null && array_key_exists('name', $this->weather)){
            return $this->weather['name'];
        }
        return null;
    }

    protected function getTemperature(){
        if(is_array($this->weather) && $this->weather!=null && array_key_exists('main', $this->weather)){
            if(array_key_exists('temp', $this->weather['main'])){
                return $this->weather['main']['temp'];
            }
        }
        return null;
    }

    protected function getForecast(){
        $res = array();
        if(is_array($this->weather) && $this->weather!=null && array_key_exists('weather', $this->weather)){
            return $this->weather['weather'];
        }
        return $res;
    }
}
