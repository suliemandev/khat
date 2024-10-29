<!DOCTYPE html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Khat</title>

        @vite('resources/css/app.css')

        @php
            $menus = collect(nova_get_menus());
            $header = $menus->where('slug', 'header')->first();
            $footer = $menus->where('slug', 'footer')->first();
        @endphp
    </head>

    <body class="font-vazirmatn antialiased bg-[#ecdcc8]" style="height: 100vh;">
        <div class="flex max-w-6xl mx-auto w-full">
            <div class="p-6 sticky top-0 overflow-auto max-h-screen">
                <div class="w-[220px] sticky top-6">
                    <img class="" src="/imgs/logo.png">
                    <div class="mt-6 flex flex-col gap-3">
                        @foreach($header['menuItems'] as $item)
                            <a href="{{ $item['value'] }}">{{ $item['name'] }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <di class="flex-1 p-6">
                <div class="bg-white rounded-sm p-4">
                    {{ $slot }}
                </div>
            </di>
        </div>
    </body>
</html>
