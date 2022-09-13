<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>PeopleWare</title>

    <!-- Scripts -->
    @livewireStyles
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @notifyCss

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body class="dark:bg-gray-800">
    @livewire('livewire-ui-modal')
    <header class="flex flex-wrap sm:justify-start sm:flex-nowrap z-50 w-full bg-white text-sm py-4 dark:bg-gray-800">
        <nav class="max-w-[85rem] w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between" aria-label="Global">
            <a class="flex-none text-xl font-semibold" href="{{ route('home') }}">PeopleWare</a>
            <div class="flex flex-row items-center gap-5 mt-5 sm:justify-end sm:mt-0 sm:pl-5">
                <a class="font-medium {{ request()->routeIs('competencias.index') ? 'text-blue-500' : 'text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }}"
                    href="{{ route('competencias.index') }}" aria-current="page">Competencias
                </a>
                <a class="font-medium {{ request()->routeIs('idiomas.index') ? 'text-blue-500' : 'text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }}"
                    href="{{ route('idiomas.index') }}">Idiomas</a>
                <a class="font-medium {{ request()->routeIs('capacitaciones.index') ? 'text-blue-500' : 'text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }}"
                    href="{{ route('capacitaciones.index') }}">Capacitaciones</a>
                <a class="font-medium {{ request()->routeIs('departamentos.index') ? 'text-blue-500' : 'text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }}"
                    href="{{ route('departamentos.index') }}">Departamentos</a>
                <a class="font-medium {{ request()->routeIs('puestos.index') ? 'text-blue-500' : 'text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }}"
                    href="{{ route('puestos.index') }}">Puestos</a>
                    <a class="font-medium {{ request()->routeIs('puestos.index') ? 'text-blue-500' : 'text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }}"
                    href="{{ route('puestos.index') }}">Candidatos</a>
                    <a class="font-medium {{ request()->routeIs('puestos.index') ? 'text-blue-500' : 'text-gray-600 hover:text-gray-400 dark:text-gray-400 dark:hover:text-gray-500' }}"
                    href="{{ route('puestos.index') }}">Empleados</a>
            </div>
        </nav>
    </header>
    <div class="container mx-auto">
        <x:notify-messages />
        {{ $slot }}
    </div>
    <livewire:confirm-delete />
    @livewireScripts
</body>

</html>
