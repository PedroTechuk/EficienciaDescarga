<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css" />

    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js"></script>

    @livewireStyles

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased">

<!-- Navbar para Mobile -->
<x-nav sticky class="lg:hidden bg-white text-dark">
    <x-slot:brand>
        <label for="main-drawer" class="lg:hidden mr-3">
            <x-icon name="o-bars-3" class="cursor-pointer" />
        </label>
        <span class=" font-medium"> Eficiencia de Descarga</span>
    </x-slot:brand>
</x-nav>

<x-main with-nav full-width class="flex flex-col lg:flex-row">
    <!-- Sidebar para Desktop -->
    <x-slot:sidebar drawer="main-drawer" collapsible class="w-full lg:w-1/4 bg-white text-dark shadow-xl mr-4">

        <!-- Logo quando não está colapsado -->
        <div class="hidden-when-collapsed mx-4 mt-3 font-black text-3xl text-[#003CA2]">Eficiencia de Descarga</div>

        <!-- Logo quando colapsado -->
        <div class="display-when-collapsed mx-2 mt-3 font-black text-3xl text-[#003CA2]">EFD</div>

        <!-- Menu -->
        <x-menu activate-by-route>
            <x-menu-item title="Mensurar Descarga" icon="o-clock" link="{{ route('descargas.index') }}" />
            <x-menu-item title="Placas" icon="o-archive-box" link="{{ route('placas.index') }}" />
            <x-menu-item title="Relatório" icon="o-document" link="{{ route('relatorios.index') }}" />
        </x-menu>
    </x-slot:sidebar>




    <!-- Conteúdo Principal -->
    <x-slot:content class="w-full lg:w-3/4">
        <x-toast />
        {{ $slot }}
        <x-toast />
    </x-slot:content>
</x-main>

@livewireScripts
@livewireScriptConfig
</body>

</html>
