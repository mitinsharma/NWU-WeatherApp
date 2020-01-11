<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'WeatherApp') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <!-- Styles -->
        <style>
            @import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900");
            @import url("https://cdn.linearicons.com/free/1.0.0/icon-font.min.css");
            body {
                font-family: 'Montserrat', sans-serif;
                //background: #112233;
            }

            .weather-card {
                margin: 60px auto;
                height: 740px;
                width: 450px;
                background: #fff;
                box-shadow: 0 1px 38px rgba(0, 0, 0, 0.15), 0 5px 12px rgba(0, 0, 0, 0.25);
                overflow: hidden;
            }
            .weather-card .top {
                position: relative;
                height: 570px;
                width: 100%;
                overflow: hidden;
                background: url("https://s-media-cache-ak0.pinimg.com/564x/cf/1e/c4/cf1ec4b0c96e59657a46867a91bb0d1e.jpg") no-repeat;
                background-size: cover;
                background-position: center center;
                text-align: center;
            }
            .weather-card .top .wrapper {
                padding: 30px;
                position: relative;
                z-index: 1;
            }
            .weather-card .top .wrapper .mynav {
                height: 20px;
            }
            .weather-card .top .wrapper .mynav .lnr {
                color: #fff;
                font-size: 20px;
            }
            .weather-card .top .wrapper .mynav .lnr-chevron-left {
                display: inline-block;
                float: left;
            }
            .weather-card .top .wrapper .mynav .lnr-cog {
                display: inline-block;
                float: right;
            }
            .weather-card .top .wrapper .heading {
                margin-top: 20px;
                font-size: 35px;
                font-weight: 400;
                color: #fff;
            }
            .weather-card .top .wrapper .location {
                margin-top: 20px;
                font-size: 21px;
                font-weight: 400;
                color: #fff;
            }
            .weather-card .top .wrapper .temp {
                margin-top: 20px;
            }
            .weather-card .top .wrapper .temp a {
                text-decoration: none;
                color: #fff;
            }
            .weather-card .top .wrapper .temp a .temp-type {
                font-size: 85px;
            }
            .weather-card .top .wrapper .temp .temp-value {
                display: inline-block;
                font-size: 85px;
                font-weight: 600;
                color: #fff;
            }
            .weather-card .top .wrapper .temp .deg {
                display: inline-block;
                font-size: 35px;
                font-weight: 600;
                color: #fff;
                vertical-align: top;
                margin-top: 10px;
            }
            .weather-card .top:after {
                content: "";
                height: 100%;
                width: 100%;
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                background: rgba(0, 0, 0, 0.5);
            }
            .weather-card .bottom {
                padding: 0 30px;
                background: #fff;
            }
            .weather-card .bottom .wrapper .forecast {
                overflow: hidden;
                margin: 0;
                font-size: 0;
                padding: 0;
                padding-top: 20px;
                max-height: 155px;
            }
            .weather-card .bottom .wrapper .forecast a {
                text-decoration: none;
                color: #000;
            }
            .weather-card .bottom .wrapper .forecast .go-up {
                text-align: center;
                display: block;
                font-size: 25px;
                margin-bottom: 10px;
            }
            .weather-card .bottom .wrapper .forecast li {
                display: block;
                font-size: 25px;
                font-weight: 400;
                color: rgba(0, 0, 0, 0.25);
                line-height: 1em;
                margin-bottom: 30px;
            }
            .weather-card .bottom .wrapper .forecast li .date {
                display: inline-block;
            }
            .weather-card .bottom .wrapper .forecast li .condition {
                display: inline-block;
                vertical-align: middle;
                float: right;
                font-size: 25px;
            }
            .weather-card .bottom .wrapper .forecast li .condition .temp {
                display: inline-block;
                vertical-align: top;
                font-family: 'Montserrat', sans-serif;
                font-size: 20px;
                font-weight: 400;
                padding-top: 2px;
            }
            .weather-card .bottom .wrapper .forecast li .condition .temp .deg {
                display: inline-block;
                font-size: 10px;
                font-weight: 600;
                margin-left: 3px;
                vertical-align: top;
            }
            .weather-card .bottom .wrapper .forecast li .condition .temp .temp-type {
                font-size: 20px;
            }
            .weather-card .bottom .wrapper .forecast li.active {
                color: rgba(0, 0, 0, 0.8);
            }
            .weather-card.rain .top {
                background: url("http://img.freepik.com/free-vector/girl-with-umbrella_1325-5.jpg?size=338&ext=jpg") no-repeat;
                background-size: cover;
                background-position: center center;
            }

        </style>
    </head>
    <body>
        @yield('content')
    </body>
</html>
