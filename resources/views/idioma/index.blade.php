<x-layout>
    <livewire:simple-table :records="$idiomas" :columns="['id', 'descripcion', 'activo']" :resource="'idiomas'" :currentRecord="$idioma" />
</x-layout>
