<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Trail Buddy</title>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/_bootswatch.scss') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/_variables.scss') }}" rel="stylesheet" type="text/css" />
        <style>
       
            html, body {
                background-color: #ffffff;
                background-image: url('/storage/IMG_4841.JPG');
                background-repeat: no-repeat;
                background-size: cover;
                font-weight: 600;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 1000%;
                color: #3399FF;
                text-shadow: 2px 2px 8px white;
            }
            
            .title-links {
                font-size: 150%;
                color: darkblue;
                text-shadow: 2px 2px 8px white;
                padding: 0px 15px;
            }

            .links > a {
                color: black;
                background-color: green;
                padding: 10px 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }SS

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
        
        
    </head>
    <body background-image="URL::to{{'/storage/IMG_4841.JPG'}}">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Trail Buddy
                </div>
                @if (Route::has('login'))
                    <div class="title-links">
                        @auth
                            <a class="title-links" href="{{ url('/home') }}">Home</a>
                        @else
                            <a class="title-links" href="{{ route('login') }}">Login</a>
                            <a class="title-links" href="{{ route('register') }}">Register</a>
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
