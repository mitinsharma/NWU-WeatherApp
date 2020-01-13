<?php
/**
 * Weather App
 * Development started and managed by Mitin Sharma
 * (c) 2019
 * http://www.mitinsharma.com
 *
 * @author mitin sharma
 *
 * This program is written in PHP to get weather information
 * from weather API. WeatherController processes, validates
 * the information using data members and send result to HTTP
 * in the form of HTML
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 */


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use Log;
class WeatherController extends Controller
{
    public $w_url;
    public $w_app_id;

    /**
     * Retrieve the weather information from wwather api
     * calls the API
     * retrieve api result
     * @return - view weather
     */
    public function index(){
        $res = [];
        $this->w_url = Config::get('app.weather_url');
        $this->w_app_id = Config::get('app.weather_app_id');
        $city = 'London,uk';

        $client = new \GuzzleHttp\Client();
        $url = $this->w_url . '?q='. $city . '&appid=' . $this->w_app_id;
        $http = $client->get($url);
        if ($http->getStatusCode() == 200) {
            $body = $http->getBody();
            $weather = json_decode($body,true);
            try{
                $res = array(
                    'location' => $this->getLocation($weather),
                    'temperature' => $this->getTemperature($weather),
                    'forecast' => $this->getForecast($weather),
                    'windSpeed' => $this->getWindSpeed($weather)
                );
            } catch (\Exception $e) {
                error_log($e);
            }
        }
        //return $res;
        return view('weather')->with('res',$res);
    }

    /**
     * Retrieve the location from api
     * retrive field name in the weather api result object
     * @return - String location
     */
    public function getLocation($weather_result){
        if(is_array($weather_result) && $weather_result!=null && array_key_exists('name', $weather_result)){
            return $weather_result['name'];
        }
        return null;
    }

    /**
     * Retrieve the temperature from api
     * retrive field 'main' in the weather api result object
     * @return - float tempratureInFahrenheit
     */
    public function getTemperature($weather_result){
        if(is_array($weather_result) && $weather_result!=null && array_key_exists('main', $weather_result)){
            if(array_key_exists('temp', $weather_result['main'])){
                return $this->kelvinToF($weather_result['main']['temp']);
            }
        }
        return null;
    }

    /**
     * Retrieve the forecast information from api
     * retrive field 'weather' in the weather api result object
     * @return - associativeArray weather
     */
    public function getForecast($weather_result){
        $res = array();
        if(is_array($weather_result) && $weather_result!=null && array_key_exists('weather', $weather_result)){
            return $weather_result['weather'];
        }
        return $res;
    }

    /**
     * Retrieve the wind speed from api
     * retrive field 'wind->speed' in the weather api result object
     * @return - float windSpeedInMPH
     */
    public function getWindSpeed($weather_result){
        if(is_array($weather_result) && $weather_result!=null && array_key_exists('wind', $weather_result)){
            if(array_key_exists('speed', $weather_result['wind'])){
                return $this->meterToMiles($weather_result['wind']['speed']);
            }
        }
        return null;
    }

    /**
     * Convert speed from metersPerSeconds to miles per hour
     * @param meterPerSec - speed values in meterPerSec
     * @return - float speedInMPH
     */
    public function meterToMiles($meterPerSec){
        try{
            return round($meterPerSec * 2.23694,1);
        } catch (\Exception $e) {
            error_log($e);
        }
        return null;
    }

    /**
     * Convert Kelvin units to fahrenheit units
     * @param tempInKelvin - temperature values in kelvin units
     * @return - float tempratureInFahrenheit
     */
    public function kelvinToF($tempInKelvin){
        try{
            return round((( $tempInKelvin - 273.15) * 9/5) + 32);
        } catch (\Exception $e) {
            error_log($e);
        }
        return;
    }
}
