<?php

namespace Tests\Feature;

use App\Http\Controllers\WeatherController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Config;

class WeatherTest extends TestCase
{
    private $weather_class;

    protected function setUp(): void {
        $this->weather_class = new WeatherController();

    }

    protected function tearDown(): void{
        $this->weather_class = null;
    }

    public function testConfigVariables(){
        $url = Config::get('app.weather_url');
        $app_id = Config::get('app.weather_app_id');
        $this->assertNotNull($url,'config weather api url is null');
        $this->assertNotNull($app_id,'config weather api app_id is null');
    }

    public function testProvideData(){
        $this->assertTrue(true);
        $arr = array(
            'coord' => array(
                'lon' => -0.13,
                'lat' => 51.51
                ),
            'weather' => array(
                array(
                    'id' => 300,
                    'main' => 'Drizzle',
                    'description' => 'light intensity drizzle',
                    'icon' => '09d'
                    )
                ),
            'base' => 'stations',
            'main' => array(
                    'temp' => 280.32,
                    'pressure' => 1012,
                    'humidity' => 81,
                    'temp_min' => 279.15,
                    'temp_max' => 281.15
                ),

            'visibilty' => 10000,
            'wind' => array(
                    'speed' => 4.1,
                    'deg' => 80
                ),
            'clouds' => array(
                    'all' => 90
                ),
            'dt' => 1485789600,
            'name' => 'London'
        );
        return $arr;
    }


    /**
     * @depends testProvideData
     */
    public function testGetTemperature($a){
        $temperature = $this->weather_class->getTemperature($a);
        $this->assertNotNull($temperature);
    }

    /**
     * @depends testProvideData
     */
    public function testGetLocation($a){
        $loc = $this->weather_class->getLocation($a);
        $this->assertNotNull($loc);
    }

    /**
     * @depends testProvideData
     */
    public function testGetForecast($a){
        $forecast = $this->weather_class->getForecast($a);
        $this->assertNotNull($forecast);
    }

    /**
     * @depends testProvideData
     */
    public function testGetWindSpeed($a){
        $ws = $this->weather_class->getWindSpeed($a);
        $this->assertNotNull($ws);
    }

    public function testMeterToMiles(){
        $this->assertNotNull($this->weather_class->meterToMiles(123456));
    }
}
