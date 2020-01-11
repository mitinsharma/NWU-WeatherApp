<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'WeatherApp') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" crossorigin="anonymous"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

        <!-- Styles -->
        <style>
            @import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900");
            @import url("https://cdn.linearicons.com/free/1.0.0/icon-font.min.css");
            body {
                font-family: 'Montserrat', sans-serif;
                //background: #112233;
            }
            .weather
            {
                display: flex;
                flex-flow: column wrap;
                box-shadow: 0px 1px 10px 0px #cfcfcf;
                overflow: hidden;
            }

            .weather .current
            {
                display: flex;
                flex-flow: row wrap;
                background-image: url("http://www.prepbootstrap.com/Content/images/shared/misc/london-view.png");
                background-repeat: repeat-x;
                color: white;
                padding: 20px;
                text-shadow: 1px 1px #F68D2E;
            }

            .weather .current .info
            {
                display: flex;
                flex-flow: column wrap;
                justify-content: space-around;
                flex-grow: 2;
            }

            .weather .current .info .city
            {
                font-size: 26px;
            }

            .weather .current .info .temp
            {
                font-size: 56px;
            }

            .weather .current .info .wind
            {
                font-size: 24px;
            }

            .weather .current .icon
            {
                text-align: center;
                font-size: 64px;
                flex-grow: 1;
                text-shadow: 1px 1px #F68D2E;
            }

        </style>
    </head>
    <body>
        @yield('content')
    </body>
</html>
