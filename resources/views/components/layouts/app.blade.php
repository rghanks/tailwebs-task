<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/css/style.css">
        <title>{{ $title ?? 'Home | Tailwebs' }}</title>      
    </head>
    <body>
  
    <div class="header container">
        <a class="logo">
            <img src="/logo.png" height="30px" />
        </a>
        <div class="header-right">
            <a href="{{ route('account.dashboard') }}">Home</a>
            <a href="{{ route('account.logout') }}">Logout</a>
        </div>
    </div>
    <br><br>
        {{ $slot }}
    </body>
</html>
