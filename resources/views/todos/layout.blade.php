<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    {{-- LIVEWIRE STYLES --}}
    @livewireStyles

    <title>TODOS</title>
</head>
<body>
    <div class="text-center pt-10 flex justify-center">
   
        <div class="w-1/3 border border-gray-400 rounded p-4">
            @yield('content')
        </div>

    </div>

    {{-- LIVEWIRE SCRIPT --}}
    @livewireScripts
</body>
</html>