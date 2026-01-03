<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traksi - {{ $title ?? 'Trucking Solutions' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html, body {
            height: 100%;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
        }
        .max-custom {
            max-width: 986px;
        }
    </style>
</head>
<body class="bg-gray-50 ">
    <x-nav />


    <main class="flex-grow w-full mx-auto px-4 py-8 max-custom">
        {{ $slot }}
    </main>
    
    <x-footer />
</body>
</html>