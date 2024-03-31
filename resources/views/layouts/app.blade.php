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

        <!-- Styles -->
        @livewireStyles 
        @stack('styles') 

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])      

        {{-- <script>
            if (localStorage.getItem('dark-mode') === 'false' || !('dark-mode' in localStorage)) {
                document.querySelector('html').classList.remove('dark');
                document.querySelector('html').style.colorScheme = 'light';
            } else {
                document.querySelector('html').classList.add('dark');
                document.querySelector('html').style.colorScheme = 'dark';
            }
        </script> --}}
    </head>
    <body
        class="font-inter antialiased bg-black text-slate-400 scroll-smooth focus:scroll-auto"
        :class="{ 'sidebar-expanded': sidebarExpanded }"
        x-data="{ sidebarOpen: false, sidebarExpanded: localStorage.getItem('sidebar-expanded') == 'true' }"
        x-init="$watch('sidebarExpanded', value => localStorage.setItem('sidebar-expanded', value))"    
    >

        <script>
            if (localStorage.getItem('sidebar-expanded') == 'true') {
                document.querySelector('body').classList.add('sidebar-expanded');
            } else {
                document.querySelector('body').classList.remove('sidebar-expanded');
            }
        </script>

        <!-- Page wrapper -->
        <div class="flex h-screen overflow-hidden">
            <x-app.sidebar />
            <!-- Content area -->

            <div class="relative flex flex-col flex-1 overflow-y-auto overflow-x-hidden @if($attributes['background']){{ $attributes['background'] }}@endif" x-ref="contentarea">

                <x-app.header />
                <main>
                    <div class="z-30 fixed top-20 right-10">
                        <button class="bg-white hover:bg-slate-800 text-black font-bold py-2 px-4 rounded-full shadow-lg">
                        Blog
                        </button>
                    </div>
                    {{ $slot }}
                </main>

                <x-app.footer/>
            </div>

        </div>

        @livewireScripts

        @stack('scripts')
    </body>
</html>
