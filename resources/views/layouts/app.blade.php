<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>{{ $page_title ?? 'Untitled Document' }}</title>
</head>
<body class="bg-blueGray-700">
    <nav class="p-3 bg-gray-200 flex justify-between mb-6">
        <ul class="flex items-center">
            <li><a href="{{ route('home') }}" class="p-3">Home</a><li>
            @auth
                <li><a href="{{ route('notes') }}" class="p-3">Notes</a><li>
            @endauth
        </ul>
        <ul class="flex items-center">
            @auth
                <li><a href="" class="p-3">{{ auth()->user()->username }}</a><li>
                <li>
                    <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                        @csrf

                        <button type="submit" >Logout</button>
                    </form>
                <li>
            @endauth
            @guest
                <li><a href="{{ route('login') }}" class="p-3">Login</a><li>
                <li><a href="{{ route('register') }}" class="p-3">Register</a><li>
            @endguest
        </ul>
    </nav>
    @yield('content')
</body>
</html>
