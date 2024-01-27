<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device=width,
        initial-scale=1">
        <title>クッター</title>
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
    </head>

    <body>
        <div class="wrapper">

            <div class="header">
                <h1>クッター</h1>
            </div>

            <div class="content">
                @yield('login')
                @yield('RegisterForm')
                @yield('article_add')
                @yield('show')
                @yield('edit')
                @yield('read')
            </div>
            
            <div class="footer">
                <p>
                    フッター
                </p>
            </div>


        </div>
    </body>
</html>
