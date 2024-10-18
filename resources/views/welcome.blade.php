<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title', 'I Project')</title>
    <link rel="icon" href="{{ Storage::path('favicon.ico') }}" type="image/x-icon">
    <!-- Link to Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
    body {
        font-family: 'Poppins', sans-serif;
    }
    </style>
</head>

<body class="flex h-screen bg-gray-900">
    @if (!isset($showSidebar) || $showSidebar)
        <x-sidebar :showSidebar="$showSidebar"/>
    @endif

    <div class="ml-64 flex-1 text-white p-4 overflow-y-auto">
        @yield('content')
    </div>
</body>

</html>
