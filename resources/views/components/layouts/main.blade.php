<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50">

    <div class="container mx-auto">
        <nav class="bg-white shadow-md rounded-b-md p-4">
            <ul class="flex justify-center gap-4 text-gray-600">
                <li class="hover:text-indigo-600">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                @guest
                <li class="hover:text-indigo-600">
                    <a href="{{ route('login.show') }}">Login</a>
                </li>
                @endguest
                @auth
                    <li class="hover:text-indigo-600">
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="hover:text-indigo-600">
                        <a href="{{ route('post.create') }}">Create Post</a>
                    </li>
                    @if(auth()->user()->role == 'admin')
                        <li class="hover:text-indigo-600">
                            <a href="{{ route('account.page') }}">Account CRUD</a>
                        </li>
                    @endif
                    <li class="hover:text-indigo-600">
                        <a href="{{ route('logout') }}">Logout</a>
                    </li>
                @endauth
            </ul>
        </nav>
        <div class="mt-6">
            {{ $slot }}
        </div>
    </div>


    @vite('resources/js/app.js')
</body>
</html>
