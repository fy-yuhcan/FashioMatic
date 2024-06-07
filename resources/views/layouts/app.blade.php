<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FashionMatic') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .icon {
            width: 40px;
            height: 40px;
            background-color: #f3f4f6;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }
        .icon svg {
            width: 24px;
            height: 24px;
            fill: #4b5563;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('fashion.upload') }}" class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C10.3 2 8.6 2.8 7.7 4.2C7.3 4.7 7.4 5.4 7.9 5.8C8.3 6.2 9 6.1 9.4 5.6C10 4.7 11 4 12 4C13.7 4 15 5.3 15 7C15 8.3 14.2 9.4 13 9.8V11.7L16 14.7V17H8V14.7L11 11.7V9.8C9.8 9.4 9 8.3 9 7C9 6.1 9.5 5.2 10.4 4.8C10.8 4.6 11 4.2 11 3.8C11 3.2 10.5 2.7 9.9 2.7C9.6 2.7 9.3 2.8 9.1 3C8.8 3.3 8.7 3.7 8.9 4.1C8.9 4.2 8.9 4.3 8.8 4.4C8.6 4.6 8.3 4.6 8.1 4.4C7.9 4.2 7.8 3.9 7.8 3.7C7.7 3.1 7.3 2.6 6.7 2.4C6.1 2.2 5.4 2.4 4.9 2.9C4.2 3.6 4 4.7 4.4 5.6C4.8 6.5 5.7 7 6.7 7C8.4 7 10 8.2 10 10C10 10.4 9.6 10.8 9.2 10.8C8.8 10.8 8.4 10.4 8.4 10C8.4 9.6 8 9.2 7.6 9.2C7.2 9.2 6.8 9.6 6.8 10C6.8 10.9 7.7 11.8 8.6 11.8C9.5 11.8 10.4 10.9 10.4 10C10.4 8.2 8.8 7 7 7C6 7 5.1 6.5 4.7 5.6C4.3 4.7 4.5 3.6 5.2 2.9C5.7 2.4 6.4 2.2 7 2.4C7.6 2.6 8 3.1 8.1 3.7C8.1 3.9 8.2 4.2 8.4 4.4C8.6 4.6 8.9 4.6 9.1 4.4C9.3 4.3 9.3 4.2 9.3 4.1C9.5 3.7 9.6 3.3 9.4 3C9.2 2.8 8.9 2.7 8.6 2.7C8 2.7 7.5 3.2 7.5 3.8C7.5 4.2 7.7 4.6 8.1 4.8C9 5.2 9.5 6.1 9.5 7C9.5 8.3 8.7 9.4 7.5 9.8V11.7L10.5 14.7V17H13.5V14.7L16.5 11.7V9.8C15.3 9.4 14.5 8.3 14.5 7C14.5 5.3 15.8 4 17.5 4C18.5 4 19.5 4.7 20.1 5.6C20.5 6.1 21.2 6.2 21.6 5.8C22.1 5.4 22.2 4.7 21.8 4.2C20.9 2.8 19.2 2 17.5 2C16.7 2 15.9 2.3 15.3 2.8C14.7 2.3 13.8 2 13 2H12Z"/></svg>
                            </a>
                        </div>
                    </div>
                    <div class="flex items-center">
                        @auth
                            <a href="{{ route('dashboard') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}" class="ml-4">
                                @csrf
                                <button type="submit" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">Register</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>



