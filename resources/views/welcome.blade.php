<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Events Calendar</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Red+Hat+Text&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- Vue component style -->
        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />

        <meta name="csrf-token" value="{{ csrf_token() }}" />
        
        <!-- Internal tyles -->
        <style>
            html, body {
                background-color: #fff;
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
                padding-top:60px;
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
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
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
            .main-input {
                border: none;
                padding: 0;
                font-size: 28px;
            }
            /* Custom styles */
            input {
                outline:none!important;
            }
            .title-wrap h1{
                font-weight: bold;
                font-size: 45px;
                color: rgb(72, 72, 72) !important;
                font-family: Helvetica;
                max-width: 1100px;
                margin: 0px auto;
            }
            input[type="date"] {
                border: 1px solid #d2d2d2;
                font-size: 16px;
                padding: 18px 0px 0px;
            }
            .form-group.from label{
                position: absolute;
                font-size: 12px;
                padding: 3px;    position: absolute;
                font-size: 12px;
                padding: 3px;
            }
            .days_wrap .day label{
                position: relative;
                top: 1px;
            }
            .btn-primary {
                color: #fff;
                background-color: #007bff;
                border-color: rgb(0, 132, 137)!important;
                background-color: rgb(0, 132, 137)!important;
                border-radius: 3px;
                outline: none!important;
            }
            .day {
                width: 100%;
            }
            .adjust-margin{
                margin-bottom: 25px;
            }
            .calendar-view-wrap {
                padding-left: 100px;
            }
            .calendar-view-wrap label {
                font-weight: bold;
                font-size: 23px;
                font-family: Helvetica Neue;
                color: rgb(72, 72, 72) !important;
            }
            .month-bg {
                display: flex;
                justify-content: left;
                align-items: flex-end;
                padding: 20px;
            }
            .month-bg label {
                color:#fff!important;
            }
        </style>
    </head>
    <body>
        <div id="app"></div>
        <!-- <div class="flex-top position-ref full-height">
            <div class="title-wrap">
                <h1>Event Calendar</h1>
                <hr>
            </div>
            <div class="container">
                <div id="app">
                    <div class="row">
                        <div class="col-lg-4">
                            create event form start
                            <calendar-form></calendar-form>
                            create event form end
                        </div>
                        <div class="col-lg-8 calendar-view-wrap">
                            <div class="month-bg" style="background-image: url('https://i.stack.imgur.com/dYKYz.jpg');height: 160px;border-radius: 5px;background-size: contain;">
                                <label>July 2019</label>
                            </div>
                        </div>
                    </div>
                    <example-component></example-component>
                    <calendar-form></calendar-form>
                </div>
            </div>
        </div> -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <!-- Vue script -->
        <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>
