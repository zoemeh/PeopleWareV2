<x-layout>
    <x-data-table :records="$departamentos" :columns="['id', 'descripcion', 'activo']" :resource="'departamentos'" />
</x-layout>
