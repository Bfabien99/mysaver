<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>mysaver</title>
</head>
<body class="flex-col">
    <header class="flex">
        <p class="logo">Saver</p>
        <nav class="flex">
            @auth()
            <li><a href="{{route('dashboard')}}" class="{{Route::is('dashboard') ? 'active-link' : ''}}">dashboard</a></li>
            <li><a href="{{route('account')}}" class="{{Route::is('account') ? 'active-link' : ''}}">account</a></li>
            <li><a href="{{route('category')}}" class="{{Route::is('category') ? 'active-link' : ''}}">category</a></li>
            <li><a href="{{route('profil')}}" class="{{Route::is('profil') ? 'active-link' : ''}}">profil</a></li>
            <li><a href="{{route('logout')}}" class="{{Route::is('logout') ? 'active-link' : ''}}">logout</a></li>
            @else 
            <li><a href="{{route('login')}}" class="{{Route::is('login') ? 'active-link' : ''}}">login</a></li>
            <li><a href="{{route('register')}}" class="{{Route::is('register') ? 'active-link' : ''}}">register</a></li>
            @endauth
        </nav>
    </header>
    <main>
        @yield('main')
    </main>
    <footer>

    </footer>
</body>
</html>