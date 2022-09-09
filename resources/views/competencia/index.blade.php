<x-layout>
    <x-data-table :records="$competencias" :columns="['id', 'descripcion', 'activo']" :resource="'competencias'" />
</x-layout>
