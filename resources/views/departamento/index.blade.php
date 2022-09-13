<x-layout>
    <livewire:simple-table :records="$departamentos" :columns="['id', 'descripcion', 'activo']" :resource="'departamentos'" :currentRecord="$departamento" />
</x-layout>
