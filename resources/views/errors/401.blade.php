<!DOCTYPE html>
<html>
    <head>
        <title>Be right back.</title>
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap-rtl.min.css')}}">
        <link href="{{asset('css/custom_login.css')}}" rel="stylesheet" type="text/css"/>
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">شما دسترسی کافی برای این بخش را ندارید.</div>
                <div class="col-md-12" style="margin: 10px;">
                    <a style="padding: 5px;margin: 5px; color: #fff; background-color: #005d2a" href="{{route('login')}}">
                        ورود به سایت
                    </a>
                </div>
            </div>
        </div>
    </body>
</html>
