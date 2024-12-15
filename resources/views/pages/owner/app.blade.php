<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon (optional) -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Google Fonts (optional) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Additional Styles (optional) -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App Styles (optional) -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9fafb;
            color: #333;
        }
    </style>
</head>
<body class="font-sans bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white">

    <!-- Navbar or Sidebar -->
    @include('layouts.navbar')  <!-- Pastikan jika menggunakan sidebar atau navbar di sini -->
    
    <div class="min-h-screen flex flex-col">
        <!-- Main Content -->
        <div class="flex-1">
            @yield('content')
        </div>

        <!-- Footer (optional) -->
        <footer class="bg-gray-800 text-white py-4 text-center">
            <p>&copy; {{ date('Y') }} Your Company Name. All rights reserved.</p>
        </footer>
    </div>

    <!-- Optional: Scripts (e.g. for modals, dropdowns, etc.) -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
