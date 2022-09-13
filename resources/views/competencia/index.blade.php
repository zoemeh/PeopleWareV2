<x-layout>
    <livewire:simple-table :records="$competencias" :columns="['id', 'descripcion', 'activo']" :resource="'competencias'" :currentRecord="$competencia" />
</x-layout>
