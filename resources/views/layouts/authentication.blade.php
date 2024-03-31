<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400..700&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles        

        <script>
            if (localStorage.getItem('dark-mode') === 'false' || !('dark-mode' in localStorage)) {
                document.querySelector('html').classList.remove('dark');
                document.querySelector('html').style.colorScheme = 'light';
            } else {
                document.querySelector('html').classList.add('dark');
                document.querySelector('html').style.colorScheme = 'dark';
            }
        </script>
    </head>
    <body class="font-inter antialiased text-slate-600 dark:text-slate-400">
        <!-- Page wrapper-->
        <main class="flex h-screen overflow-hidden">

            <!-- Content -->
            <section class="relative flex flex-col flex-1 overflow-x-hidden @if($attributes['background']){{ $attributes['background'] }}@endif" x-ref="contentarea">
                <video autoplay loop muted class="absolute z-10 w-auto min-w-full overflow-hidden max-w-none">
                    <source
                    src="{{ asset('videos/bumimanusia.webm') }}"
                    type="video/webm"
                    />
                </video>
                <div class="z-30 w-full ">

                    <div class="min-h-[100dvh] h-full flex flex-col after:flex-1">                        
                        <!-- Form -->
                        <div>
                            {{ $slot }}
                        </div>

                    </div>

                </div>
            </section>

            </main>

        </main> 

        @livewireScripts
    </body>
</html>
