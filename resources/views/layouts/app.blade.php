<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'WeatherApp') }}</title>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            @import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900");
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
                width: 100px;
                height: 100px;
                overflow: auto;
                flex-grow: 1;
                text-shadow: 1px 1px #F68D2E;
            }

        </style>
    </head>
    <body>
        @yield('content')
    </body>
</html>
