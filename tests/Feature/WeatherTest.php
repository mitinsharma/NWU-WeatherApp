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

    /**
     * Setup function creates an instance of WeatherController.
     * Calls itself before every test
     *
     * @return void
     */
    protected function setUp(): void {
        $this->weather_class = new WeatherController();
    }

    /**
     * This function set clears the instance of WeatherController
     * calls after every test
     *
     * @return void
     */
    protected function tearDown(): void{
        $this->weather_class = null;
    }

    /**
     * This function tests the config variables
     * created in .env file
     *
     * @return void
     */
    public function testConfigVariables(){
        $url = Config::get('app.weather_url');
        $app_id = Config::get('app.weather_app_id');
        $this->assertNotNull($url,'config weather api url is null');
        $this->assertNotNull($app_id,'config weather api app_id is null');
    }

    /**
     * This function produce dummy data
     * for test case. Other functions are
     * dependant on this functions return
     *
     * @return array
     */
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
     *
     * This function tests getTemperature function
     * created in WeatherController.
     * @return void
     */
    public function testGetTemperature($a){
        $temperature = $this->weather_class->getTemperature($a);
        $this->assertNotNull($temperature,'The value of temperature is null');
        $this->assertIsNotInt($temperature,'Temperature values is not a number');
    }

    /**
     * @depends testProvideData
     *
     * This function tests getLocation function
     * created in WeatherController.
     * @return void
     */
    public function testGetLocation($a){
        $loc = $this->weather_class->getLocation($a);
        $this->assertNotNull($loc,'The value of location is null');
        $this->assertIsString($loc,'The value of location is not a string');
    }

    /**
     * @depends testProvideData
     *
     * This function tests getForecast function
     * created in WeatherController.
     * @return void
     */
    public function testGetForecast($a){
        $forecast = $this->weather_class->getForecast($a);
        $this->assertNotNull($forecast,'The value of forecast is null');
        $this->assertIsArray($forecast,'Forecast does not return array');
    }

    /**
     * @depends testProvideData
     *
     * This function tests getWindSpeed function
     * created in WeatherController.
     * @return void
     */
    public function testGetWindSpeed($a){
        $ws = $this->weather_class->getWindSpeed($a);
        $this->assertNotNull($ws,'The value of WindSpeed is null');
        $this->assertIsFloat($ws,'The value of WindSpeed is not of float type');
    }

    /**
     * This test function tests meterToMiles function
     * created in WeatherController.
     *
     * @return void
     */
    public function testMeterToMiles(){
        $this->assertNotNull($this->weather_class->meterToMiles(12));
        $this->assertSame(2.2,$this->weather_class->meterToMiles(1),'Logical error in converting meter per seconds to miles per hour');
    }

    /**
     * This is a data provider function, provides
     * possible test data to other test functions.
     *
     * @return array
     */
    public function additionProvider1(){
        return [
            [1,2.2],
            [99,221.5],
            [45,100.7]
        ];
    }

    /**
     * @dataProvider additionProvider1
     */
    /*
     * This function takes @dataProvider as arguments to
     * test the range of possible dataset in meterToMiles()
     *
     * @return void
     */
    public function testMeterToMilesPosibility($x,$expected){
        $this->assertEquals($expected,$this->weather_class->meterToMiles($x),'Logical error in converting meter per seconds to miles per hour');
    }

    /**
     * This test function tests kelvinToF function
     * created in WeatherController.
     *
     * @return void
     */
    public function testkelvinToF(){
        $this->assertNotNull($this->weather_class->kelvinToF(12));
        $this->assertSame(45.0,$this->weather_class->kelvinToF(280.32),'Logical error in converting kelvin to F');
        $this->assertGreaterThan(-459.67,$this->weather_class->kelvinToF(280.32),'Temperature cannot be less than -459.67 F');
    }

    /**
     * This is a data provider function, provides
     * possible test data to other test functions.
     *
     * @return array
     */
    public function additionProvider2(){
        return [
            [280.32,45.0],
            [0,-460.0],
            [320,116.0]
        ];
    }

    /**
     * @dataProvider additionProvider2
     */
    /*
     * This function takes @dataProvider as arguments to
     * test the range of possible dataset in kelvinToF()
     *
     * @return void
     */
    public function testkelvinToFPossibility($x,$expected){
        $this->assertEquals($expected,$this->weather_class->kelvinToF($x),'Logical error in converting kelvin to F');
    }
}
