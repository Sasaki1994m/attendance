<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        Fonts 
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

         Styles 
        <style>
            html, body {
                background-color: #E0FFFF;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                color: black;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #000000;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
</html> -->
@extends('layouts.app')
@section('content')
    <body>
        <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">

                    @auth
                        <a href="{{ url('/home') }}">HOME</a>
                    @else
                        <a href="{{ route('login') }}">ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">アカウント登録</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="content"> -->
                <div class="login_top">
                勤怠管理システム
                </div>
            </div>
        </div>
    </body>
@endsection