<h2 align="center">NWU WEATHER APP</h2>

<p align="center">
<a href=""><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href=""><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Demo
 Link to the webpage [http://nwu.mitinsharma.com](http://nwu.mitinsharma.com)

## About 
NWU Weather Application is a web based weather application that demonstrate the implementation of weather api. This application is build on Laravel PHP framework.
Laravel is accessible, powerful, and provides tools required for large, robust applications.
## Features
- Displays location from API to web application.
- Calculate(kelvin units to fahrenheit units) and display temperature.
- Calculate(meter per seconds to miles per hour) and display wind speed.
- Gets forecast information such as weather info, icon, description from API and displays on the webpage.

## How to implementation this weather API in PHP Laravel
- Download or clone this repository [download link.](https://github.com/mitinsharma/NWU-WeatherApp.git)
- Install or update laravel project using composer command in project directory.
```
    composer install or composer update
```
- Add API url and APP ID to environment file .env
```
    WEATHER_URL=http://samples.openweathermap.org/data/2.5/weather
    WEATHER_APPID=b6907d289e10d714a6e88b30761fae22
```
- Make sure to add return environment variables in config/app.php
```
    return [
    'weather_url' => env('WEATHER_URL'),
    'weather_app_id' => env('WEATHER_APPID'),
    ]
```
- Controller to access Weather API is located at /app/Http/Controllers/WeatherController.php [link](https://github.com/mitinsharma/NWU-WeatherApp/blob/master/app/Http/Controllers/WeatherController.php).
- View file is located at /resources/views/weather.blade.php
- To access location dynamically use $this->city variable in controller [link](https://github.com/mitinsharma/NWU-WeatherApp/blob/master/resources/views/weather.blade.php).
```
    $this->city = 'London,uk';
```
- To change cache time in controller use $this->cache_time variable in controller.
```
    //time in minutes
    $this->cache_time = 30;
```
- To run this application, use command
```
    php artisan serve
```
- Command to clear cache and config settings
```
    php cache:clear
    php config:clear
```
## How to implement Unit Test
- Webpage test, test file to test successful retrieval of webpage is at tests/Feature/PageTest.php [link](https://github.com/mitinsharma/NWU-WeatherApp/blob/master/tests/Feature/PageTest.php).
- Test is written to test the status of homepage.
- Unit test file is located at tests/Feature/WeatherTest.php [link](https://github.com/mitinsharma/NWU-WeatherApp/blob/master/tests/Feature/WeatherTest.php).
- Command to run tests in Windows
```
    php vendor/phpunit/phpunit/phpunit
```
- Command to run tests in Mac/Linux
```
    ./vendor/bin/phpunit
```

## Perfomance Concerns
- Cross Browser testing.
- Google Lighhouse Audit.
- Google Chrome Performance monitor.
- Google Page Insights Report [link](https://developers.google.com/speed/pagespeed/insights/?url=nwu.mitinsharma.com).
- GTmeterix Report [link](https://gtmetrix.com/reports/nwu.mitinsharma.com/6wnShGYq).
- Image optization using optipng and jpegoptim packages in linux.
- Run these commands to optimize all the images in the directory.
```
    find -type f -name "*.png" -exec optipng {} \;
    find -type f -name "*.jpeg" -exec jpegoptim {}\;
```
- Enable Compression using Apache Module mod_deflate. Copy and paste below code in vhost.conf file.
```
    AddOutputFilterByType DEFLATE text/plain
    AddOutputFilterByType DEFLATE text/html
    AddOutputFilterByType DEFLATE text/xml
    AddOutputFilterByType DEFLATE text/css
    AddOutputFilterByType DEFLATE application/xml
    AddOutputFilterByType DEFLATE application/xhtml+xml
    AddOutputFilterByType DEFLATE application/rss+xml
    AddOutputFilterByType DEFLATE application/javascript
    AddOutputFilterByType DEFLATE application/x-javascript
```

## Contributing

Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

This web application is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
