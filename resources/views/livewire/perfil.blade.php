<div
    class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
    <h3 class="text-lg font-bold text-gray-800 dark:text-white">
        {{ $persona->nombre }}
    </h3>
    <p class="mt-1 text-xs font-medium uppercase text-gray-500 dark:text-gray-500">
        {{ $persona->cedula }}
    </p>
    <div>
        <div class="block">
            <span class="font-bold">Nombre</span>
            <span>{{ $persona->nombre }}</span>
        </div>

        <div class="block">
            <span class="font-bold">Cedula</span>
            <span>{{ $persona->cedula }}</span>

        </div>
        <div class="block">
            <span class="font-bold">Puesto</span>
            <span>{{ $persona->candidato->puesto->nombre }}</span>
        </div>
        <div class="block">
            <span class="font-bold">Departamento</span>
            <span>{{ $persona->candidato->puesto->Departamento->descripcion }}</span>
        </div>
        <div class="block">
            <span class="font-bold">Salario Deseado</span>
            <span>{{ $persona->candidato->salario_deseado }}</span>
        </div>
        <div class="block">
            <span class="font-bold">Recomendado Por</span>
            <span>{{ $persona->candidato->recomendado_por }}</span>
        </div>
        <div class="mb-4">
            <span class="font-bold">Idiomas</span>
            <ul class="max-w-xs flex flex-col">
                @foreach ($persona->Idiomas as $idioma)
                    <li
                        class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium bg-white border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                        {{ $idioma->descripcion }}
                    </li>
                @endforeach
            </ul>
        </div>
        <livewire:capacitaciones-table :persona="$persona" :perfil="true" />
        <livewire:simple-table :records="$persona->competencias" :columns="['id', 'descripcion', 'activo']" :perfil="true" resource="competencias" />
        <livewire:experiencias-table :persona="$persona" :perfil="true" />

    </div>
</div>
